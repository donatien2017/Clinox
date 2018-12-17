<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;




/* @var $this yii\web\View */
/* @var $model backend\models\Payement */
/* @var $form yii\widgets\ActiveForm */

$listeRecapitulatif = null;
?>

<div class="payement-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-payement-idpatient required">
        <label class="control-label" ">Patient</label>
        <input type="text"  class="form-control"  value="<?= $model->idpatient0->fullName ?>" readonly="readonly" aria-required="true">

        <div class="help-block"></div>
    </div>

    <!--***********************************************  Begin Block Détail Analyse  ***************************************************************-->
    <?php
    if(count($analyses)>=1) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des analyses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Coût</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalAnalyse = 0;
                    foreach ($analyses as $ligne) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $ligne->idanalysemedicale0->libanalysemedicale ?></td>
                            <td>
                                <?= $ligne->dateanalyse ?>
                            </td>
                            <td><?= $ligne->coutanalyse ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                        $totalAnalyse += $ligne->coutanalyse;
                    }
                    ?>
                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="3">Total Analyses</td>

                        <td><?= $totalAnalyse ?> F CFA</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucune analyse enregistrée !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $listeRecapitulatif[] = ['designation' => 'Analyse','montant' => $totalAnalyse ];
    }
    ?>

    <!--***********************************************  End Block Détail Analyse  ***************************************************************-->


    <!--***********************************************  Begin Block Détail Examen  ***************************************************************-->


    <?php
    if(count($examens)>=1) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des examens</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Coût</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalExamen = 0;
                    foreach ($examens as $ligne) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $ligne->idexamen0->libexamen ?></td>
                            <td>
                                <?= $ligne->dateexamen ?>
                            </td>
                            <td><?= $ligne->idexamen0->idtypeexamen0->coutexamen ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                        $totalExamen += $ligne->idexamen0->idtypeexamen0->coutexamen;
                    }
                    ?>
                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="3">Total Examens</td>

                        <td><?= $totalExamen ?> F CFA</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucun examen enregistré !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $listeRecapitulatif[] = ['designation' => 'Examen médical','montant' => $totalExamen ];
    }
    ?>

    <!--***********************************************  End Block Détail Examen  ***************************************************************-->


    <!--***********************************************  Begin Block Détail Consultation  ***************************************************************-->


    <?php
    if(count($consultations)>=1) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des consultations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Coût</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalConsultation = 0;
                    foreach ($consultations as $effectuerConsultations) {
                        foreach ($effectuerConsultations->detaileffectuerconsultations as $ligne) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $ligne->idconsultation0->libconsultation ?></td>
                                <td>
                                    <?= $effectuerConsultations->dateconsultation ?>
                                </td>
                                <td><?= $ligne->coutconsultation ?> F CFA</td>
                            </tr>
                            <?php
                            $i++;
                            $totalConsultation += $ligne->coutconsultation;
                        }
                    }
                    ?>
                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="3">Total Consultations</td>

                        <td><?= $totalConsultation ?> F CFA</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucune consultation enregistrée !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $listeRecapitulatif[] = ['designation' => 'Consultation','montant' => $totalConsultation ];

    }
    ?>

    <!--***********************************************  End Block Détail Consultation  ***************************************************************-->


    <!--***********************************************  Begin Block Détail Achat  ***************************************************************-->


    <?php
    if(count($achats)>=1) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des achats</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Coût</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalAchat = 0;
                    foreach ($achats as $achat) {
                        foreach ($achat->detailachats as $ligne) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $ligne->idproduit0->libproduit ?></td>
                                <td><?= $ligne->coutproduit ?> F CFA</td>
                                <td><?= $ligne->qteprod ?></td>
                                <td><?= $ligne->qteprod*$ligne->coutproduit ?></td>
                                <td><?= $achat->datecreation ?></td>
                            </tr>
                            <?php
                            $i++;
                            $totalAchat += $ligne->qteprod*$ligne->coutproduit;
                        }
                    }
                    ?>
                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="5">Total Pharmacie</td>

                        <td><?= $totalAchat ?> F CFA</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucun achat enregistré !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $listeRecapitulatif[] = ['designation' => 'Pharmacie','montant' => $totalAchat ];

    }
    ?>

    <!--***********************************************  End Block Détail Achat  ***************************************************************-->



    <!--***********************************************  Begin Block Détail hospitalisation  ***************************************************************-->


    <?php
    if(count($hospitalisations)>=1) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des hospitalisations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Coût</th>
                        <th>Nbre. Jours</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalHospitalisation = 0;
                    foreach ($hospitalisations as $ligne) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $ligne->idchbre0->nomchbre ?></td>
                            <td>
                                <?= $ligne->coutunitchbre ?> F CFA
                            </td>
                            <td><?= $ligne->nbreJours ?> Jour(s)</td>
                            <td><?= $ligne->nbreJours*$ligne->coutunitchbre ?> F CFA</td>
                            <td><?= 'Du '.$ligne->datedebut.' au '.$ligne->datefin ?> </td>
                        </tr>
                        <?php
                        $i++;
                        $totalHospitalisation += $ligne->nbreJours*$ligne->coutunitchbre;
                    }
                    ?>
                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="5">Total Hospitalisations</td>

                        <td><?= $totalHospitalisation ?> F CFA</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucune hospitalisation enregistrée !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $listeRecapitulatif[] = ['designation' => 'Hospitalisation','montant' => $totalHospitalisation ];

    }
    ?>

    <!--***********************************************  End Block Détail hospitalisation  ***************************************************************-->



    <!--***********************************************  Begin Block Détail Soin  ***************************************************************-->


    <?php
    if(count($soins)>=1) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des soins</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Coût</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalSoin = 0;
                    foreach ($soins as $donnesoin) {
                        foreach ($donnesoin->detaildonnesoins as $ligne) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $ligne->idsoin0->libsoin ?></td>
                                <td>
                                    <?= $donnesoin->datedonnesoins ?>
                                </td>
                                <td><?= $ligne->coutsoin ?> F CFA</td>
                                <td><?= $ligne->dose ?></td>
                                <td><?= $ligne->coutsoin*$ligne->dose ?> F CFA</td>
                            </tr>
                            <?php
                            $i++;
                            $totalSoin += $ligne->coutsoin*$ligne->dose;
                        }
                    }
                    ?>
                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="5">Total Soins</td>

                        <td><?= $totalSoin ?> F CFA</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucun soin enregistré !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $listeRecapitulatif[] = ['designation' => 'Soin','montant' => $totalSoin ];

    }
    ?>

    <!--***********************************************  End Block Détail Soin  ***************************************************************-->



    <!--***********************************************  Begin Block Récapitulatif  ***************************************************************-->


    <?php
    if(isset($totalAnalyse) || isset($totalExamen) || isset($totalConsultation) || isset($totalAchat) || isset($totalHospitalisation) || isset($totalSoin) ) {
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Récapitulatif</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 30px">#</th>
                        <th>Désignation</th>
                        <th>Coût</th>
                    </tr>

                    <?php
                    $i = 1;
                    $totalGénérale = 0;
                    foreach ($listeRecapitulatif as $ligne) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td width="60%"><?= $ligne['designation'] ?></td>
                            <td>
                                <?= $ligne['montant'] ?> F CFA
                            </td>
                        </tr>
                        <?php
                        $i++;
                        $totalGénérale += $ligne['montant'];
                    }
                    ?>

                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="2">Total Général</td>

                        <td><?=number_format($totalGénérale,0,'',' ') ?> F CFA</td>
                    </tr>
                    <?php
                    include_once Yii::$app->basePath."/views/payement/ChiffresEnLettres.php";
                    $lettre = new ChiffreEnLettre();

                    ?>
                    <tr style="font-size: 1.5em;">
                        <td colspan="3"> Arrêter la présente facture à la somme de : <b> <?= $lettre->Conversion($totalGénérale) ?> Francs CFA</b></td>
                    </tr>
                    </tbody>
                </table>

                <?php
                if ($i <= 1)
                    echo 'Aucun Frais trouvé !';
                ?>
            </div>
            <!-- /.box-body -->
        </div>

    <?php
    }
    ?>

    <!--***********************************************  End Block Récapitulatif  ***************************************************************-->



    <?= $form->field($model, 'montantrecu')->input('number',['maxlength' => true,'min' => $totalGénérale]) ?>
    
    <input type="number" id="payement-montantdu" class="form-control" name="Payement[montantdu]" maxlength="" value="<?= $totalGénérale ?>" >

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>