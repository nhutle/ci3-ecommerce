<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class MY_Model extends CI_Model {
    var $table = '';
    var $key = 'id';
    var $order = '';
    var $select = '';

    public function create($data) {
        if ($this->db->insert($this->table, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update($id, $data) {
        if (!$id) {
            return FALSE;
        }

        $where = array('id' => $id);

        return $this->update_rule($where, $data);
    }

    public function update_rule($where, $data) {
        if (!$where) {
            return FALSE;
        }

        $this->db->where($where);

        if ($this->db->update($this->table, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    public function delete($id) {
        if (!$id) {
            return FALSE;
        }

        if (is_numeric($id)) {
            $where = array('id' => $id);
        } else {
            $where = "id IN ('.$id.')";
        }

        return $this->del_rule($where);
    }

    public function del_rule($where) {
        if (!$where) {
            return FALSE;
        }

        $this->db->where($where);

        if ($this->db->delete($this->table)) {
            return TRUE;
        }

        return FALSE;
    }

    public function get_info($id) {
        if (!$id) {
            return FALSE;
        }

        $where = array('id' => $id);

        return $this->get_info_rule($where);
    }

    public function get_info_rule($where = array()) {
        $this->db->where($where);
        $query = $this->db->get($this->table);

        if ($query->num_rows()) {
            return $query->row();
        }

        return FALSE;
    }

    public function get_list($input = array()) {
        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    protected function get_list_set_input($input) {
        if (isset($input['select'])) {
            $this->db->select($input['select']);
        }

        if (isset($input['where']) && $input['where']) {
            $this->db->where($input['where']);
        }

        if (isset($input['order'][0]) && isset($input['order'][1])) {
            $this->db->order_by($input['order'][0], $input['order'][1]);
        } else {
            $this->db->order_by('id', 'desc');
        }

        if (isset($input['limit'][0]) && isset($input['limit'][1])) {
            $this->db->limit($input['limit'][0], $input['limit'][1]);
        }

        if (isset($input['like']) && $input['like']) {
        	$this->db->like($input['like'][0], $input['like'][1]);
        }
    }

    public function get_total($input = array()) {
        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    public function check_exists($where = array()) {
        $this->db->where($where);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
