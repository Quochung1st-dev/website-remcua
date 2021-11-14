<?php

// Integrate WP List Table for Recover Abandon Cart

if (!class_exists('WP_List_Table')) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class FP_List_Table_SCP extends WP_List_Table {

    // Prepare Items
    public function prepare_items() {
        global $wpdb;
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        $from_date = '';
        $to_date = '';

        $perPage = 10;
        $currentPage = $this->get_pagenum();
        $startpoint = ($currentPage - 1) * $perPage;
        $userprefix = $wpdb->prefix . "smartiplog";
        $num_rows = $wpdb->get_var("SELECT count(*) FROM $userprefix");
        $data = $this->table_data($startpoint, $perPage);
        $this->process_bulk_action();

        usort($data, array(&$this, 'sort_data'));
        $perPage = 10;
        $this->set_pagination_args(array(
            'total_items' => $num_rows,
            'per_page' => $perPage
        ));
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    public function column_ipaddress($item) {
        $actions = array('delete' => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>', $_REQUEST['page'], 'log_delete', $item['id']),);
        return sprintf('%1$s %3$s', $item['ipaddress'], $item['id'], $this->row_actions($actions)
        );
    }

    public function get_bulk_actions() {
        $actions = array('log_delete' => 'Delete');
        return $actions;
    }

    public function no_items() {
        echo 'No Logs Found';
    }

    public function column_whichpage($item) {
        return '<a href=' . htmlspecialchars($item['whichpage']) . '>' . htmlspecialchars($item['whichpage']) . '</a>';
    }

    public function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'ipaddress' => __('IP Address', 'recoverabandoncart'),
            'time' => __('Date & Time', 'recoverabandoncart'),
            'username' => __('Username', 'recoverabandoncart'),
            'whichpage' => __('Which Page / Post', 'recoverabandoncart'),
        );
        return $columns;
    }

    public function get_hidden_columns() {
        return array();
    }

    public function get_sortable_columns() {
        $sortable_columns = array(
            'ipaddress' => array('ipaddress', false),
            'time' => array('time', false),
            'username' => array('username', false),
        );
        return $sortable_columns;
    }

    private function table_data($startpoint, $perPage) {
        global $wpdb;
        $data = array();
        $table_name = $wpdb->prefix . "smartiplog";
        $subdatas = $wpdb->get_results("SELECT * FROM $table_name  LIMIT $startpoint, $perPage", ARRAY_A);
        return $subdatas;
    }

    public function column_default($item, $column_name) {
        switch ($column_name) {
            default:
                return $item[$column_name];
        }
    }

    public function process_bulk_action() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'smartiplog'; // do not forget about tables prefix
        if ('log_delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids))
                $ids = implode(',', $ids);
            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
                $url = esc_url_raw(add_query_arg(array('page' => 'protector'), admin_url('admin.php')));
                echo "<script>window.location.href='$url'</script>";
            }
        }
    }

    public function column_cb($item) {
        return sprintf(
                '<input type="checkbox" name="id[]" value="%s" />', $item['id']
        );
    }

    private function sort_data($a, $b) {

        $orderby = 'id';
        $order = 'asc';

        if (!empty($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }

        if (!empty($_GET['order'])) {
            $order = $_GET['order'];
        }

        $result = strnatcmp($a[$orderby], $b[$orderby]);

        if ($order === 'asc') {
            return $result;
        }

        return -$result;
    }

}
