<?php
class RoleController extends Controller
{
    public $userRepository = null;
    // khởi tạo instance
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new userRepository();
    }
    public function index()
    {
        $list = $this->userRepository->listActive();
        $data = ['list' => $list];
        $this->show('view/user/Role', $data);
    }
    public function setRole()
    {
        $list = $this->userRepository->listFunctions();
        $rmodel =  $this->userRepository;
        $parentFunc = ['parentFunc' => $list, 'rmodel' => $rmodel];
        $this->show('view/user/SetRole', $parentFunc);
    }
    public function save()
    {
        //dd($_POST);

        $this->userRepository->deny($_POST['id']);
        if (isset($_POST['func_id'])) {
            foreach ($_POST['func_id'] as $fc) {
                $rs = $this->userRepository->access($_POST['id'], $fc);
            }
            $this->setError(['alert' =>
            messenger('Set Role successful', 'success')]);
            redirect(href('role', 'setRole', ['id' => $_POST['id']]));
        }else{
            $this->setError(['alert' =>
            messenger('Role cancellation successful', 'success')]);
            redirect(href('role', 'setRole', ['id' => $_POST['id']]));
        }
    }
}
