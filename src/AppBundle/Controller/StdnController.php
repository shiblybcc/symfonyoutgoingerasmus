<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stdn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Stdn controller.
 *
 * @Route("stdn")
 */
class StdnController extends Controller
{
    /**
     * Lists all stdn entities.
     *
     * @Route("/", name="stdn_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stdns = $em->getRepository('AppBundle:Stdn')->findAll();

        return $this->render('stdn/index.html.twig', array(
            'stdns' => $stdns,
        ));
    }

    /**
     * Creates a new stdn entity.
     *
     * @Route("/new", name="stdn_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stdn = new Stdn();
        $form = $this->createForm('AppBundle\Form\StdnType', $stdn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stdn);
            $em->flush($stdn);

            return $this->redirectToRoute('stdn_show', array('id' => $stdn->getId()));
        }

        return $this->render('stdn/new.html.twig', array(
            'stdn' => $stdn,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stdn entity.
     *
     * @Route("/{id}", name="stdn_show")
     * @Method("GET")
     */
    public function showAction(Stdn $stdn)
    {
        $deleteForm = $this->createDeleteForm($stdn);

        return $this->render('stdn/show.html.twig', array(
            'stdn' => $stdn,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stdn entity.
     *
     * @Route("/{id}/edit", name="stdn_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stdn $stdn)
    {
        $deleteForm = $this->createDeleteForm($stdn);
        $editForm = $this->createForm('AppBundle\Form\StdnType', $stdn);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stdn_edit', array('id' => $stdn->getId()));
        }

        return $this->render('stdn/edit.html.twig', array(
            'stdn' => $stdn,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stdn entity.
     *
     * @Route("/{id}", name="stdn_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Stdn $stdn)
    {
        $form = $this->createDeleteForm($stdn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stdn);
            $em->flush($stdn);
        }

        return $this->redirectToRoute('stdn_index');
    }

    /**
     * Creates a form to delete a stdn entity.
     *
     * @param Stdn $stdn The stdn entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stdn $stdn)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stdn_delete', array('id' => $stdn->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
