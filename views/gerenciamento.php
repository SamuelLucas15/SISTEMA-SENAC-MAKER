<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/gerenciamento.css">
</head>

<body>
    <div class="upbar">
        <img class="img-senac" src="../public/imgs/senac_logo_branco.png" alt="">
    </div>
    <div class="downbar"></div>
    <sidebar class="sidebar">
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
    </sidebar>
    <main>
        <div class="caminho">
            <a class="home" href="inicio.php">Início/</a>
            <a class="gerenciamento" href="gerenciamento.php">Gerenciamento/</a>
        </div>
        <div class="conteudo-botaoadd-tabela">
            <section class="section1">
                <div class="alert_div">
                    <?php
                    session_start(); // Iniciar a sessão para acessar as variáveis de sessão
                    // Exibir a mensagem de erro se houver
                    if (isset($_SESSION['error_message'])) {
                        echo "<p id='message' class='alert alert-error' data-type='error'> {$_SESSION['error_message']} </p>";
                        unset($_SESSION['error_message']); // Limpar a mensagem após exibi-la
                    }
                    // Exibir a mensagem de sucesso se houver
                    if (isset($_SESSION['success_message'])) {
                        echo "<p id='message' class='alert alert-success' data-type='success'> {$_SESSION['success_message']} </p>";
                        unset($_SESSION['success_message']); // Limpar a mensagem após exibi-la
                    }
                    ?>
                </div>

                <button class="add_prod">
                    <i class="ri-add-large-line"></i>
                    Adicionar Produto
                </button>
            </section>
            <dialog class="dialog_addprod">
                <nav>
                    <h3>Adicionar Produto</h3>
                    <i class="fa-solid fa-xmark x_add_prod"></i>
                </nav>
                <form action="../src/controller/controller_cadastro_prod.php" method="POST" class="campos">
                    <div class="prod_cat">
                        <div class="div_prod">
                            <h5>Produto</h5>
                            <input name="nome" type="text" class="input_nome" placeholder="Ex.: Cabo de rede" required>
                        </div>
                        <div class="div_cat">
                            <h5>Categoria</h5>
                            <div class="search_select_box">
                                <select name="categoria" class="selectpicker" data-live-search="true">
                                    <option disabled selected>Pesquisar</option>
                                    <?php
                                    require_once('../config/dbConnect.php');
                                    $opcoes_categoria = "SELECT id, descr FROM categoria ORDER BY descr ASC";
                                    $result_categoria = $dbh->query($opcoes_categoria);
                                    $listaOpcoes_categoria = $result_categoria->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($listaOpcoes_categoria) > 0) {
                                        foreach ($listaOpcoes_categoria as $opcao_categoria) {

                                    ?>


                                            <option value="<?= $opcao_categoria['id'] ?>"> <?= $opcao_categoria['descr'] ?> </option>
                                    <?php
                                        }
                                    } else {
                                        echo 'Nenhuma categoria encontrada';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="desc">
                        <h5>Descrição</h5>
                        <input name="descricao" type="text" class="input_desc" placeholder="Ex. : Para conexão Wi-Fi" required>
                    </div>
                    <div class="quant_uni">
                        <div class="div_quant">
                            <h5>Quantidade</h5>
                            <input name="quantidade" type="text" class="input_quant" placeholder="Ex. : 200" required>
                        </div>
                        <div class="div_uni">
                            <h5>Unidade de Medida</h5>
                            <div class="search_select_box">
                                <select name="unidade_medida" class="selectpicker" data-live-search="true">
                                    <option disabled selected>Pesquisar</option>
                                    <?php
                                    $opcoes_uni_med = "SELECT id, descr FROM uni_med ORDER BY descr ASC";
                                    $result_uni_med = $dbh->query($opcoes_uni_med);
                                    $listaOpcoes_uni_med = $result_uni_med->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($listaOpcoes_uni_med) > 0) {
                                        foreach ($listaOpcoes_uni_med as $opcao_uni_med) {
                                    ?>
                                            <option value="<?= $opcao_uni_med['id'] ?>"><?= $opcao_uni_med['descr'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo 'Nenhuma unidade de medida encontrada';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="div_bot">
                        <button type="submit" class="botao_add">Adicionar</button>
                    </div>
                </form>
            </dialog>
            <section class="section2">
                <div class="tabela-g">
                    <table id="minhaTabela" class="table table-responsive table-striped table-bordered tabela-gerenciamento">
                        <thead>
                            <tr class="table-head">
                                <th>Itens</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $materiais = 'SELECT nome, id FROM material ORDER BY descr ASC';
                            $todosMat = $dbh->query($materiais);
                            $listaMat = $todosMat->fetchAll(PDO::FETCH_ASSOC);
                            if (count($listaMat) > 0) {
                                foreach ($listaMat as $mat) {
                            ?>
                                    <tr class="tabela-body-linha">
                                        <td class="text"><?= $mat['nome'] ?></td>
                                        <td class="td_btns">
                                            <button class="botao_detalhes" data-id="<?= $mat['id'] ?>" title="Detalhes">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button class="botao_editar" data-id="<?= $mat['id'] ?>" title="Editar">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="botao_desativar" title="Excluir">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                <?php
                                }
                            } else {
                                echo 'Nenhum material encontrado';
                            }
                                ?>
                                    </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </section>
        </div>
        <dialog class='dialog_detalhes'>
            <nav>
                <h3>Informações do Produto</h3>
                <i class="fa-solid fa-xmark x_detalhes"></i>
            </nav>
            <form class="campos3">
                <div class="prod_cat3">
                    <div class="div_prod3">
                        <h5>Produto</h5>
                        <input type="text" class="input_nome3" readonly>
                    </div>
                    <div class="div_cat3">
                        <h5>Categoria</h5>
                        <input type="text" class="input_cat3" readonly>
                    </div>
                </div>
                <div class="desc3">
                    <h5>Descrição</h5>
                    <input type="text" class="input_desc3" readonly>
                </div>
                <div class="quant_uni3">
                    <div class="div_quant3">
                        <h5>Quantidade</h5>
                        <input type="text" class="input_quant3" readonly>
                    </div>
                    <div class="div_uni3">
                        <h5>Unidade de Medida</h5>
                        <input type="text" class="input_uni_med3" readonly>
                    </div>
                </div>
                <div class='div_id'>
                    <h5>ID</h5>
                    <input type="text" class="input_id" readonly>
                </div>
            </form>
        </dialog>
        <dialog class="dialog_confirm">
            <div class="dialog_conteudo">
                <div class="div_dialog_mensagem">
                    <p class="dialog_mensagem"></p>
                </div>
                <div class="dialog_botoes">
                    <button class="btn_confirm">SIM</button>
                    <button class="btn_cancel">NÃO</button>
                </div>
            </div>
        </dialog>
        <dialog class="dialog_editar">
            <nav>
                <h3>Editar Produto</h3>
                <i class="fa-solid fa-xmark x_edit"></i>
            </nav>
            <form class="campos2">
                <div class="prod_cat2">
                    <div class="div_prod2">
                        <h5>Produto</h5>
                        <input type="text" class="input_nome2" placeholder="Ex.: Cabo de rede">
                    </div>
                    <div class="div_cat2">
                        <h5>Categoria</h5>
                        <div class="search_select_box">
                            <select class="selectpicker cat" data-live-search="true">
                                <?php
                                $query = $dbh->prepare("SELECT 
                                        m.id AS material_id,
                                        m.qtd AS quantidade,
                                        m.descr AS material_descr,
                                        m.nome AS material_nome,
                                        um.id AS unidade_medida_id,
                                        um.descr AS unidade_medida_descr,
                                        c.id AS categoria_id,
                                        c.descr AS categoria_descr
                                    FROM 
                                        material m
                                    JOIN 
                                        uni_med um ON m.id_uni_med = um.id
                                    JOIN 
                                        categoria c ON m.id_cat = c.id 
                                    WHERE m.id = :id");
                                $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                                $query->execute();
                                $produto = $query->fetch(PDO::FETCH_ASSOC);

                                if (count($listaOpcoes_categoria) > 0) {
                                    // Supondo que você tenha uma variável $categoria_cadastrada que contém o ID da categoria do produto
                                    $categoria_cadastrada = $produto['categoria_id'];
                                    
                                    //var_dump($categoria_cadastrada);// A categoria cadastrada para o produto
                                    /*echo "<script> 
                                        const btn_edit = document.querySelectorAll(`.botao_editar`);
                                        const idProduto = button.dataset.id;
                                   </script>";
                                    echo "<option value='" . $produto['categoria_id'] . "' selected>" . $produto['categoria_descr'] . "</option>";*/


                                    foreach ($listaOpcoes_categoria as $opcao_categoria) {
                                        // Verificando se a categoria é a cadastrada para o produto
                                        $selected = ($opcao_categoria['id'] == $categoria_cadastrada) ? 'selected' : '';
                                        
                                ?>

                                        <option value="<?= $opcao_categoria['id'] ?>">
                                            <?= $opcao_categoria['descr'] ?>
                                        </option>
                                <?php
                                    }
                                } else {
                                    echo 'Nenhuma categoria encontrada';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="desc2">
                    <h5>Descrição</h5>
                    <input type="text" class="input_desc2" placeholder="Ex. : Para conexão Wi-Fi">
                </div>
                <div class="quant_uni2">
                    <div class="div_quant2">
                        <h5>Quantidade</h5>
                        <input type="text" class="input_quant2" placeholder="Ex. : 200">
                    </div>
                    <div class="div_uni2">
                        <h5>Unidade de Medida</h5>
                        <div class="search_select_box">
                            <select class="selectpicker u_m" data-live-search="true">
                                <?php
                                if (count($listaOpcoes_uni_med) > 0) {
                                    foreach ($listaOpcoes_uni_med as $opcao_uni_med) {
                                ?>
                                        <option value="<?= $opcao_uni_med['id'] ?>"><?= $opcao_uni_med['descr'] ?></option>
                                <?php
                                    }
                                } else {
                                    echo 'Nenhuma unidade de medida encontrada';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="div_bot2">
                    <button class="botao_edit">Editar</button>
                </div>
            </form>
        </dialog>
        <div class="div_dialog_escuro"></div>
    </main>

    <!-- Link para a biblioteca de ícones FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-OH5h9J1d4F2pWOSr6QdoARnIk/lZwE2deLq5pD7zB2RyFF2zDzZQdyycfp6Hs6jb"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- Incluir o JS do DataTables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="../public/js/gerenciamento.js"></script>
    <script src="../public/js/menu_sand.js"></script>
    




    <!-- Ativar o DataTable -->
    <script>
        $(document).ready(function() {
            $('#minhaTabela').DataTable({
                language: {
                    "sEmptyTable": "Nenhum dado disponível na tabela",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Pesquisar:",
                    "sLengthMenu": "Exibir _MENU_ registros por página",
                    "sUrl": "",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Carregando...",
                    "oPaginate": {
                        "sFirst": "Primeira",
                        "sLast": "Última",
                        "sNext": "Próxima",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": ativar para ordenar coluna de forma ascendente",
                        "sSortDescending": ": ativar para ordenar coluna de forma descendente"
                    }
                },
                scrollCollapse: true,
                scrollY: '500px',



            });
        });
    </script>
</body>

</html>