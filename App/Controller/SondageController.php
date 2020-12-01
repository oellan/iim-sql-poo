<?php


namespace App\Controller;

use App\Model\SondageModel;

class SondageController extends AbstractController
{

    /**
     * SondageController constructor.
     */
    public function __construct()
    {
        parent::__construct(new SondageModel());
    }

    public function renderResponses(){
        require $this->render("sondageView.php");
    }

    public function renderCreate(){

        if (!$this->auth->islogged()) {
            $this->redirectToRoute('home');
            return;
        }

        $msg = null;

        if (!empty($_POST)) {

            if(isset($_POST['poll_submit'])){
                $title = $_POST['poll_title'];
                $response1 = $_POST['poll_response_1'];
                $response2 = $_POST['poll_response_2'];
                $date = $_POST['poll_date'];
                $time = $_POST['poll_time'];
                if(!empty($title) && !empty($response1) && !empty($response2) && !empty($date) && !empty($time)){

                    //$this->model->addPoll($title);

                }else $msg = 'Merci de remplir tous les champs.';
            }

        }

        require $this->render("creaSondageView.php");
    }

    public function renderResults(){
        require $this->render("sondageResultView.php");
    }
}