SELECT id_empresa, empresa, cnpj, endereco, cidade, uf, cep, observacao, ultima_alteracao, usuario_alteracao, ativo
FROM [contratos].[fn_empresa_selecionar](1)
ORDER BY id_empresa
OFFSET 2 ROWS
FETCH NEXT 2 ROWS ONLY