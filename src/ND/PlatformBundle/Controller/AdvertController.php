<?php

namespace ND\PlatformBundle\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\Controller ;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException ;

class AdvertController extends Controller
{
  public function indexAction($page)
  {
    if($page < 1) {
      throw new NotFoundHttpException('page "'.$page.'" inexistante.') ;
    }

    return $this->render('NDPlatformBundle:Advert:index.html.twig') ;
  }

  public function viewAction($id)
  {
    return $this->render('NDPlatformBundle:Advert:view.html.twig', array('id' => $id)) ;
  }

  public function addAction(Request $request) {
    if($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.') ;

      return $this->redirectToRoute('nd_platform_view', array('id' => 5)) ;
    }

    return $this->render('NDPlatformBundle:Advert:add.html.twig') ;
  }

  public function editAction($id, Request $request) {
    if($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.') ;

      return $this->render('NDPlatformBundle:Advert:edit.html.twig') ;
    }
  }

  public function deleteAction() {
    return $this->render('NDPlatformBundle:Advert:delete.html.twig') ;
  }
}
