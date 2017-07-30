<?php

namespace ChamadoBundle\Controller;

use ChamadoBundle\Entity\Chamado;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Chamado controller.
 *
 * @Route("chamado")
 */
class ChamadoController extends Controller
{
    /**
     * Lists all chamado entities.
     *
     * @Route("/", name="chamado_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chamados = $em->getRepository('ChamadoBundle:Chamado')->findAll();

        return $this->render('chamado/index.html.twig', array(
            'chamados' => $chamados,
        ));
    }

    /**
     * Creates a new chamado entity.
     *
     * @Route("/new", name="chamado_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chamado = new Chamado();
        $form = $this->createForm('ChamadoBundle\Form\ChamadoType', $chamado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chamado);
            $em->flush();

            return $this->redirectToRoute('chamado_show', array('id' => $chamado->getId()));
        }

        return $this->render('chamado/new.html.twig', array(
            'chamado' => $chamado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chamado entity.
     *
     * @Route("/{id}", name="chamado_show")
     * @Method("GET")
     */
    public function showAction(Chamado $chamado)
    {
        $deleteForm = $this->createDeleteForm($chamado);

        return $this->render('chamado/show.html.twig', array(
            'chamado' => $chamado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chamado entity.
     *
     * @Route("/{id}/edit", name="chamado_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Chamado $chamado)
    {
        $deleteForm = $this->createDeleteForm($chamado);
        $editForm = $this->createForm('ChamadoBundle\Form\ChamadoType', $chamado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chamado_edit', array('id' => $chamado->getId()));
        }

        return $this->render('chamado/edit.html.twig', array(
            'chamado' => $chamado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chamado entity.
     *
     * @Route("/{id}", name="chamado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Chamado $chamado)
    {
        $form = $this->createDeleteForm($chamado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chamado);
            $em->flush();
        }

        return $this->redirectToRoute('chamado_index');
    }

    /**
     * Creates a form to delete a chamado entity.
     *
     * @param Chamado $chamado The chamado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Chamado $chamado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chamado_delete', array('id' => $chamado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
