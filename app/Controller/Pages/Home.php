<?php

namespace App\Controller\Pages;
use \App\Utils\View;
use \App\Http\Methods;

class Home extends Page{
   
    public static function getHome(){

        $repositorios= json_decode(Methods::get('/users/ThayroneM/repos', ''), true);

        $htmlRepositorio='';
        foreach ($repositorios as $repo) {
            
            $commits = json_decode(Methods::get('/repos/'.$repo["full_name"].'/commits', ''), true);
            
            if($repo['archived']){
                $arquivoHtml = 'Sim';
            }else{
                $arquivoHtml = 'Não';
            }

            if($repo['disabled']){
                $disableHtml = 'Sim';
            }else{
                $disableHtml = 'Não';
            }

            if($repo['has_downloads']){
                $downloadHtml = 'Sim';
            }else{
                $downloadHtml = 'Não';
            }

            $dataCom = explode('T', $commits[0]['commit']['committer']['date']);

            $dataQ = explode('-',$dataCom[0]);
            $data = $dataQ[2]."/".$dataQ[1]."/".$dataQ[0];

            $htmlRepositorio .= '
                <tr>
                    <td>'.$repo['full_name'].'</td>
                    <td>'.$repo['url'].'</td>
                    <td>'.$data.'</td> 
                    <td>'.$arquivoHtml.'</td>  
                    <td>'.$disableHtml.'</td> 
                    <td>'.$downloadHtml.'</td> 
                </tr>
            ';
        }

       

        $content = View::render('pages/home', [
            'dados' => $htmlRepositorio,
        ]);

        return self::getPage('HOME > Github', $content);
    }
}

?>