# samp-api-php
API para San Andreas Multiplayer(SA-MP) escrito na linguagem PHP.

## http://localhost/api.php?ip=127.0.0.1:7777
### Lembre-se de substituir 127.0.0.1:7777 pelo IP e a porta do servidor, siga sempre o modelo: IP:Porta que você deseja. (Se a porta do servidor for 7777 não é obrigatório colocar)
### Resultado em JSON:
```json
{
    "error": false,
    "message": "success",
    "info": {
        "password": false,
        "players": 1,
        "maxplayers": 100,
        "address": "127.0.0.1:7777",
        "hostname": "VZ Roleplay [S1] Rol em português",
        "gamemode": "VZ:RP v4.04 - Rol em português",
        "language": "Português Brasil"
    },
    "rules": {
        "lagcomp": "Off",
        "mapname": "SA - BR/PT",
        "version": "0.3.7-R2",
        "weather": "10",
        "weburl": "rol.vancezone.com",
        "worldtime": "15:00"
    },
    "players": [
        {
            "nickname": "Thiago",
            "score": 10
        }
    ]
}
```
