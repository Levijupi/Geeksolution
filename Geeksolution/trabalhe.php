<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhe Conosco</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>

<body>
    <section id="mySection2">
        <div class="modo">
            <a href="index.html"><img src="imagens/icone.png" alt="icon" name="icon"></a>
            <button id="darkModeButton" title="Ligar/Desligar Modo Escuro" onclick="toggleDarkMode()"></button>
        </div>
        <div class="container">
            <a href="index.html"><button>Ínicio</button></a>
            <a href="sobre.html"><button>Quem Somos</button></a>
            <a href="contato.html"><button>Contato</button></a>
            <a href="servicos.html"><button>Serviços</button></a>
        </div>
    </section>
    <section id="mySection">
        <div class="modo">
            <button class="openbtn" onclick="openNav()">☰</button>
            <button id="darkModeButton" title="Ligar/Desligar Modo Escuro" onclick="toggleDarkMode()"></button>
        </div>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="index.html"><button>Ínicio</button></a>
            <a href="sobre.html"><button>Quem Somos</button></a>
            <a href="contato.html"><button>Contato</button></a>
            <a href="servicos.html"><button>Serviços</button></a>
        </div>
    </section>
    <main>
        <div class="image2">
            <div class="inicio2">
                <h2>Trabalhe Conosco</h2>
                <p>Quer fazer parte de uma equipe apaixonada por tecnologia e inovação? Estamos sempre em busca de
                    profissionais
                    comprometidos e com vontade de crescer na área de TI e IoT.</p>
            </div>
        </div>
        <br><br>
        <div class="work">
            <p>Faça parte do nosso time! Cadastre seu currículo neste do formulário</p>
            <div class="contact3">
            </div>
            <div id="contact2">

                        <form action="processaForm.php" method="post" class="form" enctype="multipart/form-data">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name2" placeholder="Digite o seu nome" required>

                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email2" placeholder="Digite o seu E-mail" required>

                        <label for="number">Número</label>
                        <input type="number" name="number" id="number2" placeholder="Digite seu número de telefone" required>

                        <label for="state">Estado</label>
                        <select id="state" name="state" required>
                            <option value="" disabled selected>Selecione</option>
                            <option value="SP">SP</option>
                        <option value="ac">AC</option>
                        <option value="al">AL</option>
                        <option value="ap">AP</option>
                        <option value="am">AM</option>
                        <option value="ba">BA</option>
                        <option value="ce">CE</option>
                        <option value="df">DF</option>
                        <option value="es">ES</option>
                        <option value="go">GO</option>
                        <option value="ma">MA</option>
                        <option value="mt">MT</option>
                        <option value="ms">MS</option>
                        <option value="mg">MG</option>
                        <option value="pa">PA</option>
                        <option value="pb">PB</option>
                        <option value="pr">PR</option>
                        <option value="pe">PE</option>
                        <option value="pi">PI</option>
                        <option value="rj">RJ</option>
                        <option value="rn">RN</option>
                        <option value="rs">RS</option>
                        <option value="ro">RO</option>
                        <option value="rr">RR</option>
                        <option value="sc">SC</option>
                        <option value="se">SE</option>
                        <option value="to">TO</option>
                     </select>

                        <label for="town">Cidade</label>
                        <input type="text" name="town" id="town" placeholder="Digite sua Cidade" required>

                        <label for="cury">Anexe seu currículo</label>
                        <input type="file" name="cury" id="cury" required>

                        <button type="submit">Enviar</button>
                        <input type="reset" value="Limpar">
                    </form>
            </div>
        </div>
    </main>
    <section>
        <div class="contato2">
            <h2>Acompanhe nossas redes sociais para ficar por dentro de todas as novidades e do nosso dia a dia!</h2>
            <div class="redes">
                <a href="#" target="_blank"><button title="Facebook"></button></a>
                <a href="#" target="_blank"><button title="Instagram"></button></a>
                <a href="#" target="_blank"><button title="Twitter"></button></a>
            </div>
    </section>
    <footer>
        <div class="menu">
            <h2>Mapping</h2>
            <a href="index.html"><button>Ínicio</button></a>
            <a href="index.html#partner"><button>Parceiros</button></a>
            <a href="index.html#main"><button>Avaliações</button></a>
            <a href="contato.html"><button>Contato</button></a>
            <a href="trabalhe.php"><button>Trabalhe Conosco</button></a>
        </div>
        <div class="menu2">
            <h2>Sobre </h2>
            <a href="sobre.html"><button>Quem Somos</button></a>
            <a href="politica.html"><button>Política de Uso</button></a>
            <a href="termos.html"><button>Termos de Uso</button></a>
        </div>
    </footer>
    <div id="saida">Saída</div>
    </div>
    <div class="logo">
        <p>Geek Solutions © 2024 Todos os Direitos Reservados</p>
    </div>

</body>

</html>