<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 29.08.2015
 * Time: 0:10
 */
class index_controller extends controller
{
    public function index()
    {
        $this->render('categories', $this->model('guideline_category')->getAll());
//        $this->render('categories', $this->model('guideline_topic')->getAll());
//        $this->render('categories', $this->model('guideline_chapter')->getAll());
//        $this->render('categories', $this->model('guideline_category')->getAll());
        $this->render('topic', $this->model('guideline_topic')->getById(2));
        $this->render('content', $this->model('guideline_content')->getByField('topic_id', 2));
        $this->render('recommendations', $this->model('guideline_recommendations')->getByField('topic_id', 2, true));
        $this->view('index' . DS . 'index');
    }

    public function index_ajax()
    {
        switch ($_REQUEST['action']) {
            case "get_guidelines":
                if($_POST['id']) {
                    $result = $this->model('guideline_guideline')->getByField('category_id', $_POST['id'], true);
                }
                echo json_encode(array('status' => 1, 'result' => $result));
                exit;
                break;

            case "get_chapters":
                if($_POST['id']) {
                    $result = $this->model('guideline_chapter')->getByField('guideline_id', $_POST['id'], true);
                }
                echo json_encode(array('status' => 1, 'result' => $result));
                exit;
                break;

            case "get_topics":
                if($_POST['id']) {
                    $result = $this->model('guideline_topic')->getByField('chapter_id', $_POST['id'], true);
                }
                echo json_encode(array('status' => 1, 'result' => $result));
                exit;
                break;

            case "get_result":
                $this->render('topic', $this->model('guideline_topic')->getById($_POST['id']));
                $this->render('content', $this->model('guideline_content')->getByField('topic_id', $_POST['id']));
                $this->render('recommendations', $this->model('guideline_recommendations')->getByField('topic_id', $_POST['id'], true));
                $template = $this->fetch('index' . DS . 'ajax' . DS . 'result');
                echo json_encode(array('status' => 1, 'template' => $template));
                exit;
                break;
        }
    }

    public function index_na()
    {
        $this->index();
    }

    public function index_na_ajax()
    {
        $this->index_ajax();
    }
}