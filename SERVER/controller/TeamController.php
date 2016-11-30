<?php

/**
 * Created by PhpStorm.
 * User: apol
 * Date: 30/11/16
 * Time: 9:42
 */

require_once "Controller.php";

class TeamController extends Controller
{
    public function manageGetVerb(Request $request) {
        $listaTeam = null;
        $id = null;
        $response = null;
        $code = null;

        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }

        $listaTeam = TeamHandlerModel::getTeam($id);

        if ($listaTeam != null) {
            $code = '200';
        } else {
            if (TeamHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }
        }

        $response = new Response($code, null, $listaTeam, $request->getAccept());
        $response->generate();
    }

    public function managePostVerb(Request $request)
    {

        $team = new Team(
            $request->getBodyParameters() // Parametros



        );

        parent::managePostVerb($request);
    }
}