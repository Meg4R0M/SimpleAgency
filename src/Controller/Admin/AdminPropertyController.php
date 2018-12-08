<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminPropertyController extends AbstractController
{

    /**
     * @var PropertyRepository
     */
    private $repository;

    /**
     * AdminPropertyController constructor.
     * @param PropertyRepository $repository
     */
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="admin_property_index", methods="GET")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {

        $properties = $paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties,
            'current_admin_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/new", name="admin_property_new", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($property);
            $em->flush();
            $this->addFlash('success', 'Le bien a été créé avec succés.');

            return $this->redirectToRoute('admin_property_index');
        }

        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView(),
            'current_admin_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/{id}", name="admin_property_show", methods="GET")
     * @param Property $property
     * @return Response
     */
    public function show(Property $property): Response
    {
        return $this->render('admin/property/show.html.twig', [
            'property' => $property,
            'current_admin_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_property_edit", methods="GET|POST")
     * @param Request $request
     * @param Property $property
     * @return Response
     */
    public function edit(Request $request, Property $property): Response
    {
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le bien a été édité avec succés.');
            return $this->redirectToRoute('admin_property_index', ['id' => $property->getId()]);
        }

        return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
            'form' => $form->createView(),
            'current_admin_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/{id}", name="admin_property_delete", methods="DELETE")
     * @param Request $request
     * @param Property $property
     * @return Response
     */
    public function delete(Request $request, Property $property): Response
    {
        if ($this->isCsrfTokenValid('delete'.$property->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($property);
            $em->flush();
            $this->addFlash('success', 'Le bien a été supprimé avec succés.');
        }

        return $this->redirectToRoute('admin_property_index');
    }
}
