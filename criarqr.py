import qrcode
import os

# Defina aqui a URL do seu subdomínio com o caminho correto
BASE_URL = "https://echotec.online/game/aluno.php"  # URL base do seu site

# Função para gerar um QR code para cada aluno
def gerar_qr_code(id_aluno):
    # URL do link do aluno com o ID
    url = f"{BASE_URL}?id={id_aluno}"

    # Gerar o QR code com o link
    qr_img = qrcode.make(url)

    # Salvar a imagem com o nome do aluno (ou ID)
    qr_img.save(f"qrcodes/qrcode_aluno_{id_aluno}.png")

# Exemplo de IDs dos alunos
ids_alunos = [1, 2, 3]  # IDs dos alunos no banco de dados

# Criar a pasta 'qrcodes' se não existir
if not os.path.exists('qrcodes'):
    os.makedirs('qrcodes')

# Gerar QR codes para cada aluno
for id_aluno in ids_alunos:
    gerar_qr_code(id_aluno)

print("QR Codes gerados com sucesso!")
