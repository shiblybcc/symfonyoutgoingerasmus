<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Stammdaten;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Stammdaten controller.
 *
 * @Route("stammdaten")
 */
class StammdatenController extends Controller
{
    /**
     * Lists all stammdaten entities.
     *
     * @Route("/", name="stammdaten_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stammdatens = $em->getRepository('AppBundle:Stammdaten')->findAll();

        return $this->render('stammdaten/index.html.twig', array(
            'stammdatens' => $stammdatens,
        ));
    }

    /**
     * Creates a new stammdaten entity.
     *
     * @Route("/new", name="stammdaten_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stammdaten = new Stammdaten();
        $address1 = new Address();
        $address1->setStreet('street name');
        $stammdaten->getAddresses()->add($address1);

        $form = $this->createForm('AppBundle\Form\StammdatenType', $stammdaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stammdaten);
            $em->flush($stammdaten);

            return $this->redirectToRoute('stammdaten_show', array('id' => $stammdaten->getId()));
        }

        return $this->render('stammdaten/new.html.twig', array(
            'stammdaten' => $stammdaten,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stammdaten entity.
     *
     * @Route("/{id}", name="stammdaten_show")
     * @Method("GET")
     */
    public function showAction(Stammdaten $stammdaten)
    {
        $deleteForm = $this->createDeleteForm($stammdaten);

        return $this->render('stammdaten/show.html.twig', array(
            'stammdaten' => $stammdaten,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stammdaten entity.
     *
     * @Route("/{id}/edit", name="stammdaten_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stammdaten $stammdaten)
    {
        $deleteForm = $this->createDeleteForm($stammdaten);
        $editForm = $this->createForm('AppBundle\Form\StammdatenType', $stammdaten);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stammdaten_edit', array('id' => $stammdaten->getId()));
        }

        return $this->render('stammdaten/edit.html.twig', array(
            'stammdaten' => $stammdaten,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stammdaten entity.
     *
     * @Route("/{id}", name="stammdaten_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Stammdaten $stammdaten)
    {
        $form = $this->createDeleteForm($stammdaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stammdaten);
            $em->flush($stammdaten);
        }

        return $this->redirectToRoute('stammdaten_index');
    }

    /**
     * Creates a form to delete a stammdaten entity.
     *
     * @param Stammdaten $stammdaten The stammdaten entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stammdaten $stammdaten)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stammdaten_delete', array('id' => $stammdaten->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
