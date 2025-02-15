<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../public/css/reservas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="upbar">
        <img class="img-senac" src="../public/imgs/senac_logo_branco.png" alt="">
    </header>
    <div class="downbar">
    </div>
    <div class="sidebar">
        <i class="fa-solid fa-bars"></i>
        <nav class="side_items">
            <a href="inicio.php">
                <i class="fa-solid fa-house"></i>
                <span>Início</span>
            </a>
            <hr>
            <a href="gerenciamento.php">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Gerenciamento</span>
            </a>
            <hr>
            <a href="reservas.php">
                <i class="fa-solid fa-table-list"></i>
                <span>Reservas</span>
            </a>
            <hr>
            <a href="relatorio.php">
                <i class="fa-solid fa-clipboard"></i>
                <span>Relatório</span>
            </a>
            <hr>
            <a href="perfil.php">
                <i class="fa-solid fa-circle-user"></i>
                <span>Perfil</span>
            </a>
        </nav>
    </div>
    <main>
        <div class="caminho">
            <a href="inicio.php" class="home">Início/</a>
            <a href="reservas.php" class="reservas">Reservas/</a>
        </div>
        <div class="pesquisa">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar por evento" class="campo-pesq">
            <button class="botao-reserva"><i class="fa-solid fa-plus"></i>Nova reserva</button>
        </div>
        <div class="container">
            <div class="calendario">
                <div class="esquerda">
                    <div class="mes">
                        <i class="fa-solid fa-caret-left prev"></i>
                        <div class="data">setembro 2024</div>
                        <i class="fa-solid fa-caret-right next"></i>
                    </div>
                    <div class="dias-sem">
                        <div>dom</div>
                        <div>seg</div>
                        <div>ter</div>
                        <div>qua</div>
                        <div>qui</div>
                        <div>sex</div>
                        <div>sab</div>
                    </div>
                    <div class="dias">
                        <!--Adicionar dias COM JS-->
                    </div>
                    <div class="goto-today">
                        <div class="goto">
                            <input type="text" placeholder="mm/aaaa" class="date-input">
                            <button class="goto-btn">Ir</button>
                        </div>
                        <button class="today-btn">Hoje</button>
                    </div>
                </div>
            </div>
            <div class="direita">
                <div class="data-hoje">
                    <div class="dia-evento">Sex</div>
                    <div class="data-evento">27 de Setembro de 2024</div>
                </div>
                <div class="eventos">
                    <!--ADICIONAR EVENTOS COM JS-->
                </div>
            </div>
        </div>
        <div class="horarios">
            <p>Horários disponíveis: 09/09/2024</p>
            <div class="selec-hora">
                <div class="botao-hora">08:00</div>
                <div class="botao-hora">08:30</div>
                <div class="botao-hora">09:00</div>
                <div class="botao-hora">09:30</div>
                <div class="botao-hora">10:00</div>
                <div class="botao-hora">10:30</div>
                <div class="botao-hora">11:00</div>
                <div class="botao-hora">11:30</div>
                <div class="botao-hora">12:00</div>
                <div class="botao-hora">12:30</div>
                <div class="botao-hora">13:00</div>
                <div class="botao-hora">13:30</div>
                <div class="botao-hora ocupado">14:00</div>
                <div class="botao-hora ocupado">14:30</div>
                <div class="botao-hora ocupado">15:00</div>
                <div class="botao-hora ocupado">15:30</div>
                <div class="botao-hora">16:00</div>
                <div class="botao-hora">16:30</div>
                <div class="botao-hora ocupado">17:00</div>
                <div class="botao-hora ocupado">17:30</div>
                <div class="botao-hora">18:00</div>
                <div class="botao-hora">18:30</div>
                <div class="botao-hora">19:00</div>
                <div class="botao-hora">19:30</div>
                <div class="botao-hora ocupado">20:00</div>
                <div class="botao-hora ocupado">20:30</div>
                <div class="botao-hora ocupado">21:00</div>
            </div>
        </div>
        <dialog class="add-reserva">
            <div class="add-event-header">
                <div class="title">Nova reserva</div>
                <i class="fas fa-times close"></i>
            </div>
            <form class="form-dados-reserva">
                <div class="add-event-body">
                    <div class="add-event-input">
                        <label for="nome-evento" class="label-input">Nome do evento <i
                                class="fa-solid fa-asterisk"></i></label>
                        <input type="text" placeholder="Ex.: Atividade com arduinos" class="event-name"
                            id="nome-evento">
                    </div>
                    <div class="add-event-input">
                        <label for="responsavel-evento" class="label-input">Solicitante <i
                                class="fa-solid fa-asterisk"></i></label>
                        <input type="text" placeholder="Ex.: Sebastião Gomes" class="event-owner"
                            id="responsavel-evento">
                    </div>
                    <div class="add-event-input">
                        <label for="data-evento" class="label-input">Data do evento <i
                                class="fa-solid fa-asterisk"></i></label>
                        <input type="date" placeholder="Ex.: 01/01/2025" class="event-date" id="data-evento">
                    </div>
                    <div class="add-event-input">
                        <label for="desc-evento" class="label-input">Email <i
                            class="fa-solid fa-asterisk"></i></label>
                        <input type="text" placeholder="Ex.: Sebastiao2024@senac.com" class="event-email" id="email">
                    </div>
                    <div class="add-event-input desc">
                        <label for="desc-evento" class="label-input">Descrição</label>
                        <input type="text" placeholder="Descrição do evento" class="event-desc" id="desc-evento">
                    </div>
                    <div class="add-event-input">
                        <label for="hora-inicio-evento" class="label-input">De: <i
                                class="fa-solid fa-asterisk"></i></label>
                        <select class="event-time-from" id="hora-inicio-evento">
                            <option value="1">08:00</option>
                            <option value="1">08:30</option>
                            <option value="1">09:00</option>
                            <option value="1">09:30</option>
                            <option value="1">10:00</option>
                            <option value="1">10:30</option>
                            <option value="1">11:00</option>
                            <option value="1">11:30</option>
                            <option value="1">12:00</option>
                            <option value="1">12:30</option>
                            <option value="1">13:00</option>
                            <option value="1">13:30</option>
                            <option value="1">14:00</option>
                            <option value="1">14:30</option>
                            <option value="1">15:00</option>
                            <option value="1">15:30</option>
                            <option value="1">16:00</option>
                            <option value="1">16:30</option>
                            <option value="1">17:00</option>
                            <option value="1">17:30</option>
                            <option value="1">18:00</option>
                            <option value="1">18:30</option>
                            <option value="1">19:00</option>
                            <option value="1">19:30</option>
                            <option value="1">20:00</option>
                            <option value="1">20:30</option>
                        </select>
                    </div>
                    <div class="add-event-input">
                        <label for="hora-fim-evento" class="label-input">Até: <i
                                class="fa-solid fa-asterisk"></i></label>
                        <select class="event-time-to" id="hora-fim-evento">
                            <option value="1">08:30</option>
                            <option value="1">09:00</option>
                            <option value="1">09:30</option>
                            <option value="1">10:00</option>
                            <option value="1">10:30</option>
                            <option value="1">11:00</option>
                            <option value="1">11:30</option>
                            <option value="1">12:00</option>
                            <option value="1">12:30</option>
                            <option value="1">13:00</option>
                            <option value="1">13:30</option>
                            <option value="1">14:00</option>
                            <option value="1">14:30</option>
                            <option value="1">15:00</option>
                            <option value="1">15:30</option>
                            <option value="1">16:00</option>
                            <option value="1">16:30</option>
                            <option value="1">17:00</option>
                            <option value="1">17:30</option>
                            <option value="1">18:00</option>
                            <option value="1">18:30</option>
                            <option value="1">19:00</option>
                            <option value="1">19:30</option>
                            <option value="1">20:00</option>
                            <option value="1">20:30</option>
                            <option value="1">21:00</option>
                        </select>
                    </div>
                    <button class="confirma-reserva">Confirmar Reserva</button>
                </div>
            </form>
        </dialog>
    </main>

    <!-- Link para a biblioteca de ícones FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-OH5h9J1d4F2pWOSr6QdoARnIk/lZwE2deLq5pD7zB2RyFF2zDzZQdyycfp6Hs6jb"
        crossorigin="anonymous"></script>
    <script src="../public/js/reservas.js"></script>
    <script src="../public/js/menu_sand.js"></script>
</body>

</html>

