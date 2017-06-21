<html>
    <head>
        <title>Registrar provas</title>

        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- My styles -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <nav>
            <div class="nav-wrapper green darken-3">
                <a href="<?= url('/') ?>" class="brand-logo">BioQuiz</a>
                <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>-->
            </div>
        </nav>
        <div class="row">
            <div class="col s12 m7 offset-m2">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <div class="row">
                            <form class="col s12" action="<?= url('form-register-questions-save')?>" method="post">
                                <div class="row">
                                      <div class="input-field col s12">
                                        <select name="proof_id">
                                            <option value="" disabled selected>Selecione sua prova</option>
                                            <?php foreach($proofs as $proof) { ?>
                                                <option value="<?= $proof->id ?>"><?= $proof->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="question" name="question" class="materialize-textarea"></textarea>
                                        <label for="question">Enunciado</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="a" name="a" class="materialize-textarea"></textarea>
                                        <label for="a">Opção A</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="b" name="b" class="materialize-textarea"></textarea>
                                        <label for="b">Opção B</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="c" name="c" class="materialize-textarea"></textarea>
                                        <label for="c">Opção C</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="d" name="d" class="materialize-textarea"></textarea>
                                        <label for="d">Opção D</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>Correta:</p>
                                    <p>
                                        <input name="correct" type="radio" id="a_c" value="a" />
                                        <label for="a_c">A</label>
                                    </p>
                                    <p>
                                        <input name="correct" type="radio" id="b_c" value="b" />
                                        <label for="b_c">B</label>
                                    </p>
                                    <p>
                                        <input name="correct" type="radio" id="c_c" value="c" />
                                        <label for="c_c">C</label>
                                    </p>
                                    <p>
                                        <input name="correct" type="radio" id="d_c" value="d" />
                                        <label for="d_c">D</label>
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="waves-effect waves-light btn">Cadastrar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if(isset($success)) { ?>
                                        <div class="card-panel green darken-3"><?= $success ?></div>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>