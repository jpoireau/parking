<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Mail\Testmail;
use Illuminate\Support\Facades\Mail;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Hash;

class connexion extends Controller
{
    public function connexion()
    {
        $utilisateur = null;
        $id = null;
        $motdepasse = null;
        $admin = null;
        $error = 0;
        $user = $_POST['user'];
        $pswd = $_POST['pswd'];
        $connect = utilisateur::select('*')->where('nomUtilisateur', '=', $user)->get();
        foreach ($connect as $connectdata) {
            $utilisateur = $connectdata -> nomUtilisateur;
            $id = $connectdata -> idUtilisateur;
            $motdepasse = $connectdata -> motDePasseUtilisateur;
            $inscrit = $connectdata -> estInscrit;
            $admin = $connectdata -> isAdministrateur;
        }
        if ($utilisateur != null && Hash::check($pswd, $motdepasse)) {
            if ($inscrit == 0) {
                $error = 2;
                return view('pageconnexion', compact('error'),);
            }
            else {
                if ($admin == 0) {
                    $action = 1;
                    return view('user.acceuiluser', compact('id'), compact('action'));
                }
                else {
                    return view('admin.acceuiladmin', compact('id'));
                }
            }
        }
        else {
            $error = 1;
            return view('pageconnexion', compact('error'));
        }
    }

    public function inscriptionexe()
    {
        $verif = utilisateur::select('*')->get();
        $error = 0;
        foreach ($verif as $verifdata) {
            if ($verifdata -> nomUtilisateur == $_GET['user']) {
                $error = 1;
            }
            if ($verifdata -> mail == $_GET['mail']) {
                $error = 2;
            }
        }
        if ($_GET['password'] != $_GET['newpassword']) {
            $error = 3;
        }
        if ($error == 0) {
            $error = 4;
            $max = DB::table('utilisateurs')->max('idUtilisateur');
            $max++;
            $inscription = DB::table('utilisateurs')->insert([
                'idUtilisateur' => $max,
                'nomUtilisateur' => $_GET['user'],
                'nom' => $_GET['nom'],
                'prenom' => $_GET['prenom'],
                'mail' => $_GET['mail'],
                'motDePasseUtilisateur' => Hash::make($_GET['password']),
                'isAdministrateur' => false,
            ]);
            return view('pageconnexion', compact('error'));
        }
        // return back();
        return view('pageinscription', compact('error'));
    }

    public function reinitialisemdp()
    {
        $error = 2;
        $verif = utilisateur::select('mail')->where('isAdministrateur','=',false)->get();
        foreach ($verif as $verifdata) {
            if ($verifdata->mail == $_GET['email']) {
                $error = 3;
            }
        }
        if ($error == 3) {
            $error = 5;
            utilisateur::where('mail', '=',$_GET['email'])->update(array('motDePasseOublie' => true));
            return view('pageconnexion', compact('error'));
        }
        else {
            return view('mdpoublie', compact('error'));
        }

    }

    public function testmail()
    {
        $mail = "ceci est un texte";

        Mail::to('araujohugo@msn.com')->send(new Testmail($mail));
        return "E-Mail envoyer";
    }
}
