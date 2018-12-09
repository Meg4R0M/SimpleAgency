<?php
/**
 * Created by PhpStorm.
 * User: meg4r0m
 * Date: 08/12/18
 * Time: 15:24
 */

namespace App\Controller\Admin;

use App\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminPictureController
 * @package App\Controller\Admin
 * @Route("/admin/picture")
 */
class AdminPictureController extends AbstractController
{
    /**
     * @param Picture $picture
     * @param Request $request
     * @return JsonResponse
     * @Route("/{id}", name="admin_picture_delete", methods="DELETE")
     */
    public function delete(Picture $picture, Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if ($this->isCsrfTokenValid('delete' . $picture->getId(), $data['_token'])) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush();
            $this->addFlash('success', 'Le bien a été supprimé avec succés.');
            return new JsonResponse(['success' => 1]);
        }

        return new JsonResponse(['error' => "Token invalide"], 400);
    }
}
