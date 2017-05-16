## Sobre

Este é um script PHP bem simples que usa algumas funções GD para gerar
certificados de eventos. Como normalmente os eventos no Brasil precisam deste
tipo de material, propomos três tipos de certificado com estas informações:

 * Nome do participante e horas totais de participação
 * Nome do palestrante e o título da apresentação
 * Nome do organizador e horas totais gastas na organização do evento

Será pedido ao usuário que ele digite seu endereço de e-mail para visualizar
uma lista com seus certificados.

![Certificate Example](https://github.com/vmassuchetto/certificate-generator/raw/master/doc/certificate-example.png)


## Softwares necessários

 * PHP >= 5.3 com a extensão GD
 * ~~MySQL >= 4~~
 * Adapters para Json e Mysql


## Instalando e configurando


Crie um arquivo `config.php` usando `config-sample.php`, e o edite de acordo
com as instruções dentro dele.

    cp config-sample.php config.php

Crie um arquivo `participant.json` usando `json-sample.json`, e o edite de acordo
com as instruções dentro dele.

    cp json-sample.json participant.json

Crie uma pasta `cache` e certifique-se que o usuário web tem permissão de
escrita nela. Em todo caso:

    chmod 777 cache

Você provavelmente vai querer mudar as mensagens no `index.php` também.

## Formato dos dados e templates de certificados

Um template de certificado é nada mais do que uma imagem de fundo com os locais
pré-definidos para inserção dos dados em forma de texto. Estes templates
precisam ficar na pasta `img/bg-<certificate type>.png`. A localização em que o
texto fica na imagem está no arquivo `config.php` nas constantes `IMG_NAME_*` e
`IMG_DATA_*`.

* Adicionado modelo de bg-speaker.png e bg-attendee.png para facilitar a utilização.

![Certificate Template](https://github.com/vmassuchetto/certificate-generator/raw/master/doc/certificate-template.png)

