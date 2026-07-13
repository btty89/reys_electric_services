<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create(['name' => 'Arandela, pendente ou spot comum', 'price' => 55.00]);
        Service::create(['name' => 'Lâmpada fluorescente/LED (tubular)', 'price' => 60.00]);
        Service::create(['name' => 'Lustres simples / luminária', 'price' => 80.00]);
        Service::create(['name' => 'Lustres grandes / luminária', 'price' => 120.00]);
        Service::create(['name' => 'Refletor de jardim', 'price' => 90.00]);
        Service::create(['name' => 'Refletor de poste comum', 'price' => 110.00]);
        Service::create(['name' => 'Refletor de poste com lâmpada a vapor', 'price' => 110.00]);
        Service::create(['name' => 'Interruptor simples ou pulsador', 'price' => 50.00]);
        Service::create(['name' => 'Interruptor tree-way / four way', 'price' => 60.00]);
        Service::create(['name' => 'Interruptor duplo / bipolar', 'price' => 60.00]);
        Service::create(['name' => 'Interruptor e tomada (juntos)', 'price' => 50.00]);
        Service::create(['name' => 'Reator de lâmpada a vapor', 'price' => 70.00]);
        Service::create(['name' => 'Fotocélula / sensor presença', 'price' => 70.00]);
        Service::create(['name' => 'Refletor LED + fotocélula ou sensor de presença', 'price' => 60.00]);
        Service::create(['name' => 'Luminária de emergência de sobrepor', 'price' => 70.00]);
        Service::create(['name' => 'Luminária de emergência de embutir (caixinha 2x4)', 'price' => 55.00]);
        Service::create(['name' => 'Instalação perfil de LED (o metro linear)', 'price' => 140.00]);
        Service::create(['name' => 'Luminária tubular - troca sistema de reator para LED', 'price' => 70.00]);

        Service::create(['name' => 'Tomada simples', 'price' => 30.00]);
        Service::create(['name' => 'Tomada dupla', 'price' => 40.00]);
        Service::create(['name' => 'Tomada tripla', 'price' => 50.00]);
        Service::create(['name' => 'Tomada de piso e/ou telefone', 'price' => 50.00]);
        Service::create(['name' => 'Tomada industrial (3P+T)', 'price' => 80.00]);
        Service::create(['name' => 'Instalação tomada de sobrepor com canaleta', 'price' => 55.00]);
        Service::create(['name' => 'Chave de bóia superior e inferior (em residência)', 'price' => 100.00]);
        Service::create(['name' => 'Ventilador de teto', 'price' => 120.00]);
        Service::create(['name' => 'Ventilador de parede', 'price' => 80.00]);
        Service::create(['name' => 'Chuveiro elétrico simples', 'price' => 80.00]);
        Service::create(['name' => 'Chuveiro luxo (eletrônico / pressurizado / ducha)', 'price' => 120.00]);
        Service::create(['name' => 'Troca de resistência de chuveiro', 'price' => 70.00]);
        Service::create(['name' => 'Torneira elétrica', 'price' => 80.00]);
        Service::create(['name' => 'Campainha até 20 mts', 'price' => 60.00]);
        Service::create(['name' => 'Interfone 1 chamada', 'price' => 130.00]);
        Service::create(['name' => 'Interfone 2 chamadas', 'price' => 170.00]);
        Service::create(['name' => 'Interfone 4 chamadas', 'price' => 370.00]);
        Service::create(['name' => 'Vídeo porteiro', 'price' => 160.00]);
        Service::create(['name' => 'Câmeras CFTV 1 câmera Wi-Fi', 'price' => 130.00]);
        Service::create(['name' => 'Câmeras CFTV 3 câmeras Wi-Fi', 'price' => 310.00]);
        Service::create(['name' => 'Portão eletrônico deslizante', 'price' => 230.00]);
        Service::create(['name' => 'Portão eletrônico pivotante e/ou basculante', 'price' => 430.00]);
        Service::create(['name' => 'Botoeira para fechadura eletrônica', 'price' => 50.00]);
        Service::create(['name' => 'Fechadura eletrônica', 'price' => 130.00]);
        Service::create(['name' => 'Exaustor cozinha ou banheiro', 'price' => 200.00]);
        Service::create(['name' => 'Instalação de sistema de alarme residencial', 'price' => 700.00]);
        Service::create(['name' => 'Instalação de aquecedor elétrico', 'price' => 1800.00]);
        Service::create(['name' => 'Instalação de detector fumaça', 'price' => 1000.00]);
        Service::create(['name' => 'Instalação de cerca elétrica', 'price' => 50.00]);
        Service::create(['name' => 'Instalação de nobreak', 'price' => 250.00]);
        Service::create(['name' => 'Instalação de aquecedor a gás', 'price' => 270.00]);
        Service::create(['name' => 'Instalação de termostato / temporizador', 'price' => 80.00]);

        Service::create(['name' => 'Instalação de haste aterramento', 'price' => 189.00]);
        Service::create(['name' => 'Instalação de contator e/ou relé térmico', 'price' => 199.00]);
        Service::create(['name' => 'Instalação e montagem QDC (6 circuitos + DR + DPS)', 'price' => 533.00]);
        Service::create(['name' => 'Instalação e montagem QDC (12 circuitos + DR + DPS)', 'price' => 807.00]);
        Service::create(['name' => 'Instalação e montagem QDC (18 circuitos + DR + DPS)', 'price' => 1011.00]);
        Service::create(['name' => 'Instalação e montagem QDC (24 circuitos + DR + DPS)', 'price' => 1355.00]);

        Service::create(['name' => 'Entrada monofásica (QM para QDC)', 'price' => 183.00]);
        Service::create(['name' => 'Entrada bifásica ou trifásica (QM para QDC)', 'price' => 248.00]);
        Service::create(['name' => 'Alimentação para motores', 'price' => 172.00]);

        Service::create(['name' => 'Curto circuito monofásico', 'price' => 140.00]);
        Service::create(['name' => 'Curto circuito bifásico', 'price' => 172.00]);
        Service::create(['name' => 'Curto circuito trifásico', 'price' => 199.00]);

        Service::create(['name' => 'Instalação de medidor monofásico', 'price' => 1161.00]);
        Service::create(['name' => 'Instalação de medidor bifásico', 'price' => 1387.00]);
        Service::create(['name' => 'Instalação de medidor trifásico', 'price' => 1613.00]);

        Service::create(['name' => 'Instalação carregador veicular', 'price' => 1613.00]);

        Service::create(['name' => 'Alimentação elétrica para ar condicionado', 'price' => 103.00]);
        Service::create(['name' => 'Instalação ar condicionado split inverter 9000 BTUS', 'price' => 522.00]);
        Service::create(['name' => 'Instalação ar condicionado split inverter 12000 BTUS', 'price' => 522.00]);
        Service::create(['name' => 'Instalação ar condicionado split inverter 18000 BTUS', 'price' => 635.00]);
        Service::create(['name' => 'Instalação ar condicionado split inverter 24000 BTUS', 'price' => 753.00]);
        Service::create(['name' => 'Instalação ar condicionado split inverter 30000 BTUS', 'price' => 925.00]);
        Service::create(['name' => 'Instalação ar condicionado ON OFF convencional 9000 BTUS', 'price' => 463.00]);
        Service::create(['name' => 'Instalação ar condicionado ON OFF convencional 12000 BTUS', 'price' => 522.00]);
        Service::create(['name' => 'Instalação ar condicionado ON OFF convencional 18000 BTUS', 'price' => 581.00]);
        Service::create(['name' => 'Instalação ar condicionado ON OFF convencional 24000 BTUS', 'price' => 694.00]);
        Service::create(['name' => 'Instalação ar condicionado ON OFF convencional 30000 BTUS', 'price' => 807.00]);
        Service::create(['name' => 'Limpeza em tubulação de ar condicionado', 'price' => 60.00]);

        Service::create(['name' => 'Instalação de painel solar', 'price' => 8708.00]);

        Service::create(['name' => 'Atendimento técnico emergencial (final de semana)', 'price' => 242.00]);
        Service::create(['name' => 'Atendimento técnico emergencial (durante a semana)', 'price' => 172.00]);

        Service::create(['name' => 'Instalação de interruptor inteligente', 'price' => 119.00]);
        Service::create(['name' => 'Instalação mini relé interruptor', 'price' => 172.00]);
        Service::create(['name' => 'Instalação relé de impulso', 'price' => 140.00]);
        Service::create(['name' => 'Instalação relé dimmer', 'price' => 172.00]);
        Service::create(['name' => 'Instalação e configuração controle remoto universal', 'price' => 119.00]);
        Service::create(['name' => 'Instalação de tomada inteligente', 'price' => 81.00]);
        Service::create(['name' => 'Instalação mini relé controle de persiana', 'price' => 172.00]);
        Service::create(['name' => 'Instalação e configuração HUB', 'price' => 172.00]);
        Service::create(['name' => 'Instalação e configuração roteador', 'price' => 119.00]);
        Service::create(['name' => 'Instalação e configuração fechadura inteligente', 'price' => 226.00]);
        Service::create(['name' => 'Instalação e configuração assistente virtual (Alexa)', 'price' => 119.00]);
    }
}
