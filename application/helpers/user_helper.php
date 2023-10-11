<?php

function is_logged_in($title)
{
    $ci = get_instance();
    if (!$ci->session->userdata('nik')) {
        redirect('auth/login');
    } else {
        $role_id = $ci->session->userdata('role_id');

        $querySubmenu = $ci->db->get_where('user_sub_menu', ['title' => $title])->row_array();
        $id_menu = $querySubmenu['menu_id'];
        // var_dump($title);
        // die();

        $queryMenu = $ci->db->get_where('user_menu', ['id_menu' => $id_menu])->row_array();
        $menu_id = $queryMenu['id_menu'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('404_override');
        }
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
