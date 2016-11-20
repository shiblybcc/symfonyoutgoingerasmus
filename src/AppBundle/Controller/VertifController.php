<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vertif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vertif controller.
 *
 * @Route("vertif")
 */
class VertifController extends Controller
{
    /**
     * Lists all vertif entities.
     *
     * @Route("/", name="vertif_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vertifs = $em->getRepository('AppBundle:Vertif')->findAll();

        return $this->render('vertif/index.html.twig', array(
            'vertifs' => $vertifs,
        ));
    }

    /**
     * Creates a new vertif entity.
     *
     * @Route("/new", name="vertif_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vertif = new Vertif();
        $form = $this->createForm('AppBundle\Form\VertifType', $vertif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vertif);
            $em->flush($vertif);

            return $this->redirectToRoute('vertif_show', array('id' => $vertif->getId()));
        }

        return $this->render('vertif/new.html.twig', array(
            'vertif' => $vertif,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vertif entity.
     *
     * @Route("/{id}", name="vertif_show")
     * @Method("GET")
     */
    public function showAction(Vertif $vertif)
    {
        $deleteForm = $this->createDeleteForm($vertif);

        return $this->render('vertif/show.html.twig', array(
            'vertif' => $vertif,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vertif entity.
     *
     * @Route("/{id}/edit", name="vertif_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vertif $vertif)
    {
        $deleteForm = $this->createDeleteForm($vertif);
        $editForm = $this->createForm('AppBundle\Form\VertifType', $vertif);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vertif_edit', array('id' => $vertif->getId()));
        }

        return $this->render('vertif/edit.html.twig', array(
            'vertif' => $vertif,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vertif entity.
     *
     * @Route("/{id}", name="vertif_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vertif $vertif)
    {
        $form = $this->createDeleteForm($vertif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vertif);
            $em->flush($vertif);
        }

        return $this->redirectToRoute('vertif_index');
    }

    /**
     * Creates a form to delete a vertif entity.
     *
     * @param Vertif $vertif The vertif entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vertif $vertif)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vertif_delete', array('id' => $vertif->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
