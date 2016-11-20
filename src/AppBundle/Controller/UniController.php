<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Uni;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Uni controller.
 *
 * @Route("uni")
 */
class UniController extends Controller
{
    /**
     * Lists all uni entities.
     *
     * @Route("/", name="uni_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $unis = $em->getRepository('AppBundle:Uni')->findAll();

        return $this->render('uni/index.html.twig', array(
            'unis' => $unis,
        ));
    }

    /**
     * Creates a new uni entity.
     *
     * @Route("/new", name="uni_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $uni = new Uni();
        $form = $this->createForm('AppBundle\Form\UniType', $uni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($uni);
            $em->flush($uni);

            return $this->redirectToRoute('uni_show', array('id' => $uni->getId()));
        }

        return $this->render('uni/new.html.twig', array(
            'uni' => $uni,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a uni entity.
     *
     * @Route("/{id}", name="uni_show")
     * @Method("GET")
     */
    public function showAction(Uni $uni)
    {
        $deleteForm = $this->createDeleteForm($uni);

        return $this->render('uni/show.html.twig', array(
            'uni' => $uni,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing uni entity.
     *
     * @Route("/{id}/edit", name="uni_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Uni $uni)
    {
        $deleteForm = $this->createDeleteForm($uni);
        $editForm = $this->createForm('AppBundle\Form\UniType', $uni);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('uni_edit', array('id' => $uni->getId()));
        }

        return $this->render('uni/edit.html.twig', array(
            'uni' => $uni,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a uni entity.
     *
     * @Route("/{id}", name="uni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Uni $uni)
    {
        $form = $this->createDeleteForm($uni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($uni);
            $em->flush($uni);
        }

        return $this->redirectToRoute('uni_index');
    }

    /**
     * Creates a form to delete a uni entity.
     *
     * @param Uni $uni The uni entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Uni $uni)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('uni_delete', array('id' => $uni->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
