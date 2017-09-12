<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\PostType;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PostFilterType;


/**
 * Post controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("post")
 */
class PostController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = [
        'yml' => 'AppBundle/Resources/config/Post.yml',
    ];

    /**
     * Lists all Post entities.
     *
     * @Route("/", name="post")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $this->config['filterType'] = PostFilterType::class;
        $response = parent::indexAction($request);

        return $response;
    }

    /**
     * Creates a new Post entity.
     *
     * @Route("/", name="post_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $this->config['newType'] = PostType::class;
        $response = parent::createAction($request);

        return $response;
    }

    /**
     * Displays a form to create a new Post entity.
     *
     * @Route("/new", name="post_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $this->config['newType'] = PostType::class;
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("/{id}/edit", name="post_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $this->config['editType'] = PostType::class;
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Post entity.
     *
     * @Route("/{id}", name="post_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $this->config['editType'] = PostType::class;
        $response = parent::updateAction($request, $id);

        return $response;
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/{id}", name="post_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $response = parent::deleteAction($request, $id);

        return $response;
    }

    /**
     * Exporter Post.
     *
     * @Route("/exporter/{format}", name="post_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a Post entity.
     *
     * @Route("/autocomplete-forms/get-page", name="post_autocomplete_page")
     */
    public function getAutocompletePage(Request $request)
    {
        $options = [
            'repository' => "AppBundle:Page",
            'field'      => "id",
        ];
        $response = parent::getAutocompleteFormsMwsAction($request, $options);

        return $response;
    }

    /**
     * Autocomplete a Post entity.
     *
     * @Route("/autocomplete-forms/get-pageembed", name="post_autocomplete_pageembed")
     */
    public function getAutocompletePageembed(Request $request)
    {
        $options = [
            'repository' => "AppBundle:Page",
            'field'      => "id",
        ];
        $response = parent::getAutocompleteFormsMwsAction($request, $options);

        return $response;
    }

    /**
     * Autocomplete a Post entity.
     *
     * @Route("/autocomplete-forms/get-images", name="post_autocomplete_images")
     */
    public function getAutocompleteImages(Request $request)
    {
        $options = [
            'repository' => "AppBundle:Image",
            'field'      => "id",
        ];
        $response = parent::getAutocompleteFormsMwsAction($request, $options);

        return $response;
    }
}
