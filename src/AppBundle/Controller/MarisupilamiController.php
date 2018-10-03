<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Marisupilami;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Marisupilami controller.
 *
 * @Route("Action")
 */
class MarisupilamiController extends Controller
{
    /**
     * Lists all marisupilami entities.
     *
     * @Route("/", name="Action_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marisupilamis = $em->getRepository('AppBundle:Marisupilami')->findAll();

        return $this->render('marisupilami/index.html.twig', array(
            'marisupilamis' => $marisupilamis,
        ));
    }


    /**
     * Lists all user entities.
     *
     * @Route("/new", name="user_index")
     * @Method("GET")
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Marisupilami')->findAll();

        return $this->render('marisupilami/new.html.twig', array(
            'users' => $users,
        ));
    }

    /**

     *
     * @Route("/Supp", name="show_supp")
     * @Method("GET")
     */
    public function SuppAction()
    {       $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Marisupilami')->findAll();
        return $this->render('marisupilami/delete.html.twig', array(
            'users' => $users,
        ));
    }


    /**


     * @Route("/{id}/Supp/doSupp", name="Action_supp")
     * @Method({"GET", "POST"})
     */
    public function SuppAmisAction(Request $request,$id)
    {
        $amisid = $request->query->get('friends');


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:Marisupilami')->findOneBy(array('id'=> $id));
        $amis = $em->getRepository('AppBundle:Marisupilami')->findOneBy(array('id'=> $amisid));
        $user->SuppAmis($amis);
        $em->persist($user);
        $em->flush();
        return $this->render('marisupilami/index.html.twig', array(
        ));
    }

    /**

     *
     * @Route("/Ajout", name="show_ajout")
     * @Method("GET")
     */
    public function AjoutAction()
    {       $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Marisupilami')->findAll();
        return $this->render('marisupilami/new.html.twig', array(
            'users' => $users,
        ));
    }


    /**


     * @Route("/{id}/Ajout/doAjout", name="Action_ajout")
     * @Method({"GET", "POST"})
     */
    public function AjoutAmisAction(Request $request,$id)
    {
        $amisid = $request->query->get('friends');


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:Marisupilami')->findOneBy(array('id'=> $id));
        $amis = $em->getRepository('AppBundle:Marisupilami')->findOneBy(array('id'=> $amisid));
        $user->AjoutAmis($amis);
        $em->persist($user);
        $em->flush();
        return $this->render('marisupilami/index.html.twig', array(
        ));
    }


    /**
     * Finds and displays a marisupilami entity.
     *
     * @Route("/{id}", name="Action_show")
     * @Method("GET")
     */
    public function showAction(Marisupilami $marisupilami)
    {
        $deleteForm = $this->createDeleteForm($marisupilami);

        return $this->render('marisupilami/show.html.twig', array(
            'marisupilami' => $marisupilami,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Finds and displays a marisupilami entity.
     *
     * @Route("/{id}/show", name="Action_show1")
     * @Method("GET")
     */
    public function showAction1(Marisupilami $marisupilami)
    {
        $deleteForm = $this->createDeleteForm($marisupilami);

        return $this->render('marisupilami/show1.html.twig', array(
            'marisupilami' => $marisupilami,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing marisupilami entity.
     *
     * @Route("/{id}/edit", name="Action_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Marisupilami $marisupilami)
    {
        $deleteForm = $this->createDeleteForm($marisupilami);
        $editForm = $this->createForm('AppBundle\Form\MarisupilamiType', $marisupilami);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Action_edit', array('id' => $marisupilami->getId()));
        }

        return $this->render('marisupilami/edit.html.twig', array(
            'marisupilami' => $marisupilami,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a marisupilami entity.
     *
     * @Route("/{id}", name="Action_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Marisupilami $marisupilami)
    {
        $form = $this->createDeleteForm($marisupilami);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($marisupilami);
            $em->flush();
        }

        return $this->redirectToRoute('Action_index');
    }

    /**
     * Creates a form to delete a marisupilami entity.
     *
     * @param Marisupilami $marisupilami The marisupilami entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Marisupilami $marisupilami)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Action_delete', array('id' => $marisupilami->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
