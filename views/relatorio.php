<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link rel="stylesheet" href="../public/css/relatorio_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.min.css">
</head>

<body class="corpo">
    <div class="upbar">
        <img class="img-senac" src="../public/imgs/senac_logo_branco.png" alt="">
    </div>
    <div class="downbar">
    </div>
    <div class="sidebar">
        <img src="../public/imgs/bars-solid.svg" alt="" class="menu_sand">
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
    <main class="relatorio">
        <div class="caminho">
            <a class="home" href="inicio.php">Início/</a>
            <a class="link-relatorio" href="relatorio.php">Relatório/</a>
        </div>
        <h1 class="relator">Relatório</h1>
        <h1 class="relat">Relatório</h1>
        <?php
        // Verifica e inclui o controlador
        if (!file_exists('../src/controller/controller_relatorio.php')) {
            die('Erro: O arquivo controller_relatorio.php não foi encontrado!');
        }

        require_once('../src/controller/controller_relatorio.php');

        // Testa se a função atualizarStatusReservas existe
        if (!function_exists('atualizarStatusReservas')) {
            die('Erro: A função atualizarStatusReservas não está definida!');
        }

        // Atualiza os status das reservas
        atualizarStatusReservas();

        // Obtém os dados das reservas
        $listaInfos = obterReservas();
        ?>

        <section class="tabela">
            <table id="myTable" class="table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Solicitante</th>
                        <th>E-mail</th>
                        <th>Responsável</th>
                        <th>Status</th>
                        <th>Material</th>
                        <th>Data evento</th>
                        <th>Hora inicial</th>
                        <th>Hora Final</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($listaInfos) > 0) {
                        foreach ($listaInfos as $info) {
                            $status = $info['stts'];
                            $data = (new DateTime($info['dt']))->format('d/m/Y');
                    ?>
                    <tr>
                        <td><?= $info['id'] ?></td>
                        <td><?= $info['solicitante'] ?></td>
                        <td><?= $info['email'] ?></td>
                        <td><?= $info['nome_usuario'] ?></td>
                        <td><?= $status ?></td>
                        <td><?= $info['nome_material'] ?></td>
                        <td><?= $data ?></td>
                        <td><?= $info['hr_i'] ?></td>
                        <td><?= $info['hr_f'] ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <div class="end"></div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-OH5h9J1d4F2pWOSr6QdoARnIk/lZwE2deLq5pD7zB2RyFF2zDzZQdyycfp6Hs6jb"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"></script>
    <script src="../public/js/relatorio_script.js"></script>
    <script src="../public/js/menu_sand.js"></script>
</body>
</html>