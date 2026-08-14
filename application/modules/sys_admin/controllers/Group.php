<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Aauth');
        if (!$this->aauth->is_loggedin()) {
            redirect('login');
        }

        $this->load->model(array('Group_model'));
    }

    function index()
    {
        $data['parent_id'] = '34';
        $data['module_id'] = '7';
        $data['title'] = "Group";

        $data['groups'] = $this->Group_model->getGroups();
        if (empty($_POST)) {
        } else {
            $id_group = $_POST['id_group'];
            $group = array(
                'id' => $id_group,
                'name' => $_POST['nama'],
                'definition' => $_POST['definition'],
            );
            $selectedMenusOld = preg_replace("/[^0-9,]/", "", $_POST['selectedMenusOld']);
            $selectedMenus = preg_replace("/[^0-9,]/", "", $_POST['selectedMenus']);

            $detail = $this->getDataUpdateGroup($selectedMenus, $selectedMenusOld);
            $this->Group_model->updateGroup($id_group, $group, $detail['arrAdd'], $detail['arrDelete']);
        }

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('v_group',$data);
        $this->load->view('template/admin_footer');
    }

    function getAllMenuByGroup($id_group)
    {
        $group = $this->Group_model->getGroupById($id_group);
        $menuData = $this->Group_model->getAllMenuByGroup($id_group);
        $menuTree = $this->buildTree(0, $menuData);
        $menuOld = [];
        foreach ($menuData as $old) {
            if ($old['is_selected'] == 1) {
                $menuOld[] = $old['id'];
            }
        }


        $response = array(
            // 'csrfName' => $this->security->get_csrf_token_name(),
            // 'csrfHash' => $this->security->get_csrf_hash(),
            'result'  => true,
            'menuTree' => $menuTree,
            'group' => $group,
            'menuOld' => $menuOld,
            'data' => $menuData
        );
        echo json_encode($response);
    }

    private function buildTree($parent_id, $menuData)
    {
        $tree = [];
        foreach ($menuData as $menu) {
            if ($menu['parent_id'] == $parent_id) {
                $node = [
                    'id' => $menu['id'],
                    'text' => $menu['name'],
                    'state' => [
                        'selected' => $menu['is_selected'] == 1, // Centang jika is_selected = 1
                        'opened' => true // Awal semua node terbuka
                    ]
                ];
                $children = $this->buildTree($menu['id'], $menuData);
                if (!empty($children)) {
                    $node['children'] = $children;
                }
                $tree[] = $node;
            }
        }
        return $tree;
    }

    function getDataUpdateGroup($selectedMenus, $selectedMenusOld)
    {
        $selectedMenus = explode(',', $selectedMenus);
        $selectedMenusOld = explode(',', $selectedMenusOld);
        $arrDelete = array();
        $arrAdd = array();

        for ($i = 0; $i < count($selectedMenusOld); $i++) {
            if (in_array($selectedMenusOld[$i], $selectedMenus) == false) {
                array_push($arrDelete, $selectedMenusOld[$i]);
            }
        }

        for ($i = 0; $i < count($selectedMenus); $i++) {
            if (in_array($selectedMenus[$i], $selectedMenusOld) == false) {
                array_push($arrAdd, $selectedMenus[$i]);
            }
        }

        $response = array(
            'arrDelete' => $arrDelete,
            'arrAdd' => $arrAdd
        );
        return $response;
    }


}