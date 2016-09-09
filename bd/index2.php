<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> C.A.F.E. </title>
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../bootstrap.css">
    <LINK rel="stylesheet" type="text/css" href="../bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
</head>
<body class="plBG7">
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="ext/logo_transp_branco.png" width="100"> </div> </nav>
        <div id="pnNImprime" class="collapse hidden-print">
            <form class="form-custom plBG9" method="post" name="form" id="formulario">
                <div id="pn01">
                    <label class="labPer" for="pNome">Nome</label> <br/>
                    <input  id="pNome" type="text" placeholder="Digite seu nome" class="form-control" title="Nome" maxlength="70"/> <br/>

                    <label class="labPer" for="pIdade">Idade</label> <br/>
                    <input id="pIdade" type="number" placeholder="0" min="0" max="150" class="form-control">
                    <small class="right collapse" id="smCorrecao">Correção do fator de atividade Física: <span id="spCorrecao"> ~ </span> <br/> </small> <br/>

                    <div id="pnSexo">
                        <label class="labPer">Sexo</label> <br/>
                        <label class="custom-control custom-radio">
                            <input id="pSexMasculino" name="pSex" type="radio" value="opSex1" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Masculino</span>
                        </label>
                        <label class="custom-control custom-radio m-l-3">
                            <input id="pSexFeminino" name="pSex" type="radio" value="opSex2" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Feminino</span>
                        </label>
                    </div> <br/>
                </div>

                <div class="collapse" id="pn02">
                    <label class="labPer" for="pMassa">Massa corporal</label>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" id="pMassa" placeholder="0" min="0" max="300" step="any" class="form-control">
                            <div class="input-group-addon">Kg</div>
                        </div>
                    </div> <br/>

                    <label class="labPer" for="pEstrutura">Estatura</label>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" id="pEstrutura" placeholder="0" min="0" max="2,5" step="any" class="form-control">
                            <div class="input-group-addon">m</div>
                        </div>
                    </div> <br/>

                    <div class="collapse" id="pnGravida">
                        <label class="labPer">Gestante</label> <br/>
                        <label class="custom-control custom-radio">
                            <input id="pGravidaS" name="pGravida" type="radio" value="opGra1" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Sim</span>
                        </label>
                        <label class="custom-control custom-radio m-l-3">
                            <input id="pGravidaN" name="pGravida"  type="radio" value="opGra2" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Não</span>
                        </label>
                    </div> <br/>
                </div>

                <div class="collapse" id="pn03">
                    <label for="pNivel" class="labPer">Nível de atividade física</label>
                    <select id="pNivel" class="form-control">
                        <option value=""> (Clique para selecionar) </option>
                        <option value="1"> Leve </option>
                        <option value="2"> Moderada </option>
                        <option value="3" id="opIntensa"> Intensa </option>
                    </select>
                    <small class="left collapse" id="smFator">Fator de atividade Física: <span id="spFator"> ~ </span> </small>
                    <br/>
                </div>

                <div class="collapse" id="pn05">
                    <sup class="f-right">*Os campos abaixo são opcionais, clique para preencher</sup> <br/>

                    <div id="pnIMCD" onclick="imcPeso('fID')">
                        <label for="pImcDes" class="labPer">IMC desejado (Kg/m<sup>2</sup>)</label>
                    </div>

                    <div id="pnPesoImc">
                        <div> <div class="form-group m-a-0 collapse" id="fID">
                                <div class="input-group">
                                    <input type="number" id="pImcDes" placeholder="0" min="0" class="form-control">
                                    <div class="input-group-addon">Kg/m<sup>2</sup></div>
                                </div> </div> </div>

                        <div> <div class="form-group m-a-0 collapse" id="fPD">
                                <div class="input-group">
                                    <input type="number" id="pPesoDes" placeholder="0" min="0" max="300" class="form-control">
                                    <div class="input-group-addon">Kg</div>
                                </div> </div> </div>
                    </div>
                    <div id="pnPesoD" onclick="imcPeso('fPD')">
                        <label for="pPesoDes" class="labPer">Peso desejado (em Kg)</label>
                    </div>
                </div><br/>

                <div class="collapse" id="pn04">
                    <button id="btnCalc" class="btn btn-primary btn-block btn-lg" type="button" onclick="calculo()">Calcular</button>
                </div>

            </form>
            <br/>
        </div>
        <div class="result-custom pC9 crPreta collapse" id="pnResposta">
            <div id="pnImprime">
                <table class="table table-striped">
                    <thead class="thead-inverse"> <tr> <th class="text-md-center" colspan="4"> Dados Básicos </th> </tr> </thead>
                    <tbody>
                    <tr> <td class="text-md-center" colspan="4"> <span id="pnRNome"> NOME </span> </td> </tr>
                    <tr>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Idade: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnRIdade"> IDADE </span> </td>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Sexo: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnRSexo"> SEXO </span> </td> </tr>
                    <tr>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Massa corporal: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnRMassa"> MASSA </span> </td>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Estatura: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnREstatura"> ESTATURA </span> </td> </tr>
                    <tr>
                        <th class="col-md-6 text-md-right" colspan="2"> <span> Nível de atividade Física: </span> </th>
                        <td class="col-md-6 text-md-left" colspan="2"> <span id="pnRNivel"> NÍVEL </span> </td>
                    </tr>
                    <th class="text-md-center" scope="row" style="display: none" id="cGest"> <span>Gestante</span> </th>
                    </tbody>
                </table> <br/>

                <table class="table table-striped">
                    <thead class="thead-inverse"> <tr> <th class="text-md-center" colspan="3"> Dados Nutricionais </th> </tr> </thead>
                    <tbody>
                    <tr>
                        <th class="col-md-4 text-md-right" scope="row">GET (Gasto Energético Total):</th>
                        <td class="col-md-4 text-md-center"> <span id="cGET"> - </span> </td>
                        <td class="col-md-4 text-md-left"> <span> </span> </td> </tr>
                    <tr>
                        <th class="col-md-4 text-md-right" scope="row">GMB (Gasto Metabólico Basal):</th>
                        <td class="col-md-4 text-md-center"> <span id="cGMB"> - </span> </td>
                        <td class="col-md-4 text-md-left"> <span> </span> </td> </tr>
                    <tr>
                        <th class="col-md-4 text-md-right" scope="row">IMC (Índice de Massa Corporal):</th>
                        <td class="col-md-4 text-md-center"> <span id="cIMC"> - </span> </td>
                        <td class="col-md-4 text-md-left"> <span id="dIMC"> - </span> </td> </tr>
                    </tbody>
                </table> <br/>

                <div id="pnDadosNut" class="collapse">
                    <table class="table table-striped">
                        <thead class="thead-inverse"> <tr> <th class="text-md-center" colspan="2"> Projeções </th> </tr> </thead>
                        <tbody>
                        <tr>
                            <th class="col-md-6 text-md-right"> <span> Índice de Massa Corporal desejado: </span> </th>
                            <td class="col-md-6 text-md-left"> <span id="pnRIndice"> - </span> </td> </tr>
                        <tr>
                            <th class="col-md-6 text-md-right"> <span> Peso desejado: </span> </th>
                            <td class="col-md-6 text-md-left"> <span id="pnRPeso"> - </span> </td> </tr>
                        <tr>
                            <th class="col-md-6 text-md-right"> <span id="pnOpQuilos"> - </span> </th>
                            <td class="col-md-6 text-md-left"> <span id="pnRQuilos"> - </span> </td>
                        </tr>

                        </tbody>
                    </table> </div> <br/>
            </div>

            <div align="center" class="p-x-1 hidden-print">
                <button id="btnRecalc" class="btn btn-primary btn-block btn-lg" type="button" onclick="recalculo()">Recalcular / Modificar dados</button>
                <br/>
                <button id="btnPrint" class="btn btn-primary btn-block btn-lg" type="button" onclick="Imprime()">Imprimir</button>
            </div>
            <br/> <br/> <br/>
        </div>
    </div> <br/>

</div>
</body>
</html>