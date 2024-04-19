# WHMCS - Validador de Duplicidade de CPF/CNPJ no WHMCS

Este script PHP foi desenvolvido para adicionar uma verificação de duplicidade de CPF/CNPJ durante o processo de validação de detalhes do cliente no WHMCS. Ele utiliza os ganchos (hooks) do WHMCS para interceptar o processo de validação e realizar as verificações necessárias.

## Pré-requisitos

- Você deve ter acesso ao código-fonte do WHMCS para instalar este script.
- Certifique-se de ter permissões adequadas para modificar os arquivos do WHMCS.

## Instalação

1. Faça o download do arquivo `CpfCnpjValidator.php`.
2. Faça login no painel administrativo do seu WHMCS.
3. Acesse Opções/Campos personalizados.
4. Clique em "Adicionar Novo Hook".
5. No campo "Nome do Gancho", insira `ClientDetailsValidation`.
6. No campo "Prioridade", insira `1`.
7. No campo "Função PHP", cole o conteúdo do arquivo `CpfCnpjValidator.php`.
8. Clique em "Salvar".

Agora, o script está instalado e será executado durante o processo de validação de detalhes do cliente.

## Notas Importantes

- Certifique-se de que o arquivo `CpfCnpjValidator.php` esteja corretamente configurado com as informações do seu ambiente do WHMCS.
- Este script foi testado no WHMCS [insira a versão do WHMCS aqui]. 

## Suporte

Se você encontrar problemas durante a instalação ou tiver dúvidas sobre o funcionamento deste script, sinta-se à vontade para [abrir uma issue](link para as issues do GitHub) neste repositório.

---

Lembre-se de substituir `[insira a versão do WHMCS aqui]` pelo número da versão do WHMCS que você testou. Além disso, forneça um link adequado para as issues do GitHub, caso os usuários encontrem problemas e queiram reportá-los.

