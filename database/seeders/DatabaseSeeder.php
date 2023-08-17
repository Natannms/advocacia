<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Graduation;
use App\Models\OccupationArea;
use App\Models\OccupationAreaItem;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Client::factory(3)->create();
        \App\Models\Document::factory(10)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
        ]);

        \App\Models\Team::factory()->create([
            'name' => 'admin',
            'user_id' => $user->id,
        ]);


        $occuoationArea = OccupationArea::create([
            'name' => 'Direito Constitucional',
            'short_description'=>'O Departamento de Direito Constitucional atua na promoção de ações para o reconhecimento de direitos fundamentais e no reconhecimento da inconstitucionalidade/constitucionalidade de legislações federais, estaduais e municipais.'
        ]);


        $occuoationAreaItems = [
            [
                'occupation_area_id' => $occuoationArea->id,
                'description' => 'Tutela de Direitos Fundamentais Individuais, Coletivos e Sociais'
            ],
            [
                'occupation' => $occuoationArea->id,
                'description' => 'Nacionalidade e Direitos Políticos'
            ],
            [
                'occupation' => $occuoationArea->id,
                'description' => 'Ações Populares'
            ],
            [
                'occupation' => $occuoationArea->id,
                'description' => 'Ações Civis Públicas'
            ],
            [
                'occupation' => $occuoationArea->id,
                'description' => 'Mandados de Segurança individuais e coletivos'
            ],
            [
                'occupa tion' => $occuoationArea->id,
                'description' => 'Ações de Constitucionalidade (ADI, ADC, ADPF) e Mandados de Injunção'
            ],

        ];

        OccupationAreaItem::insert($occuoationAreaItems);

        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Administrativo',
            'short_description' => '
            O Departamento de Direito Administrativo atua na defesa do direito de servidores, terceiros que firmem contratos com a Administração Pública e para cidadãos.
            '
        ]);


        $occuoationAreaItems = [
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Servidor Público"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Atos e Contratos administrativos"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Licitações"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Serviço público"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Concurso público"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Responsabilidade extracontratual do Estado (indenizações)"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Improbidade Administrativa"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Processos administrativos e disciplinares (PAD)"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Tribunais de Contas"
            ],
            [
                'occupation_area_id' => $occupationArea2->id,
                "description" => "Terceiro setor (entidades sem fins lucrativos)"
            ]
        ];
        OccupationAreaItem::insert($occuoationAreaItems);

        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Previdenciário',
            'short_description' =>'O departamento de Direito Previdenciário tem sua atuação voltada ao reconhecimento do melhor benefício para trabalhadores e servidores públicos, além de auxiliar no planejamento para uma aposentadoria que garanta uma velhice despreocupada financeiramente.'
        ]);

        $occuoationAreaItems = [
            [
                'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Regime Geral de Previdência Social (RGPS)"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Regime Próprio de Previdência Social (RPPS)"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Aposentadorias (programada e voluntária, rural, especial, híbrida por idade e regras de transição)"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Benefícios por incapacidade temporária e permanente (auxílio-doença e ap. por invalidez)"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Pensão por morte"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Auxílio-acidente"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Auxílio-reclusão"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Revisões"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Planejamento previdenciário"
                ],

                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Benefício assistencial (LOAS)"
                ],
                [
                    'occupation_area_id' => $occupationArea2->id,
                    "description"=>"Processos administrativos em geral (emissão de CTC, averbação de tempo, entre outros)"
                ]
        ];
        OccupationAreaItem::insert($occuoationAreaItems);


        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Eleitoral',
            'short_description' =>'O Departamento de Direito Eleitoral presta suporte consultivo e contencioso para partidos, coligações, federações e candidatos em todas as questões jurídicas relativas a candidaturas, pleitos e organização partidária'
        ]);

        $occuoationAreaItems  = array("Assessoria jurídica para candidatos, coligações, partidos e federações", "Assessoria em convenção, registros de candidatura e debates", "Ações eleitorais (AIRC, AIJE, AIME, RCED, representações, entre outras)", "Ações por infidelidade partidária", "Prestações de contas eleitoral e partidária", "Assessoria para partidos políticos");

        foreach ($occuoationAreaItems as $item) {
            OccupationAreaItem::create([
                'occupation_area_id' => $occupationArea2->id,
                'description' => $item
            ]);
        }


        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Tributário',
            'short_description' =>'O Departamento de Direito Tributário atua com o atendimento consultivo e contencioso para estruturação de sociedades para otimizar o impacto tributário, bem como propondo ações e elaborando defesas em caso de cobranças tributárias indevidas. Além disso, oferecemos suporte jurídico para formalização de parcelamentos e transações tributárias.
            '
        ]);

        $occuoationAreaItems  = array("Consultoria tributária", "Defesa administrativa em autos de infração", "Defesa em execuções fiscais", "Ações declaratórias de inexistência de débito e anulatórias de débitos fiscais", "Restituição de tributos pagos indevidamente", "Atuação para reconhecimento de isenções fiscais (isenção IR, IPI, ICMS etc.)", "Planejamento tributário");

        foreach ($occuoationAreaItems as $item) {
            OccupationAreaItem::create([
                'occupation_area_id' => $occupationArea2->id,
                'description' => $item
            ]);
        }


        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Ambiental',
            'short_description' =>'O Departamento de Direito Ambiental atua de forma consultiva e contenciosa para afastar riscos ambientais e obter licenças, além de oferecer suporte jurídico em ações que busquem indenizações e a aplicação de penalidades administrativas e criminais.'
        ]);

        $occuoationAreaItems  =array("Defesa prévia e recursos administrativos em autuações por infração ambiental", "Assessoria em Termo de Ajustamento de Conduta (TAC) e Plano de Recuperação em área degradada (PRAD)", "Assessoria para compensação de reserva ambiental", "Ações anulatórias de auto de infração ambiental", "Defesa em Execução Fiscal Ambiental");

        foreach ($occuoationAreaItems as $item) {
            OccupationAreaItem::create([
                'occupation_area_id' => $occupationArea2->id,
                'description' => $item
            ]);
        }


        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Penal',
            'short_description' =>'O Departamento de Direito Penal é focada na defesa de cidadãos que estejam sendo investigados e processados pela prática de crimes, especialmente aqueles praticados contra a Administração Pública.
            '
        ]);

        $occuoationAreaItems  =array("Defesa e acompanhamento de investigações criminais", "Defesa em ações penais, especial crimes contra a Administração Pública, ordem tributária, eleitorais, ambientais e econômicos", "Atuação como assistente de acusação no apoio a vítimas", "Defesa e representação de pessoas jurídicas em investigações e ações penais");
        foreach ($occuoationAreaItems as $item) {
            OccupationAreaItem::create([
                'occupation_area_id' => $occupationArea2->id,
                'description' => $item
            ]);
        }

        $occupationArea2 = OccupationArea::create([
            'name' => 'Direito Sucessório',
            'short_description' =>'O Departamento de Direito Sucessória atua na organização patrimonial preventiva para redução do impacto tributário na transmissão hereditária, bem como oferece suporte jurídico para a escolha da forma menos onerosa e mais ágil para a conclusão do arrolamento/inventário.'
        ]);

        $occuoationAreaItems  = array("Assistência em inventários extrajudiciais", "Assessoria para testamentos", "Atuação em ações de inventário judicial", "Arrolamento judicial", "Sobrepartilha de bens", "Anulação de partilha e testamentos", "Planejamento sucessório", "Divórcios extrajudiciais e judiciais");
        foreach ($occuoationAreaItems as $item) {
            OccupationAreaItem::create([
                'occupation_area_id' => $occupationArea2->id,
                'description' => $item
            ]);
        }


        // TEAMS AND GRADUATIONS



        $team = Team::create([
            'name' => 'Lais Pires Queiroz Pereira',
            'document' => 'OAB/PR 91.623',
            'img_name' => 'lais-pires-queiroz-pereira.jpg',
        ]);

        $graduation  =array("Graduada em Direito pela Universidade Positivo", "Especialista em Direito Administrativo pela Universidade Estadual de Londrina (UEL)", "Especialista em Filosofia Jurídica e Política pela Universidade Estadual de Londrina (UEL)", "Graduanda em Letras pela Universidade Estadual do Centro-Oeste (UNICENTRO)");

        foreach ($graduation as $item) {
            Graduation::create([
                'team_id' => $team->id,
                'description' => $item
            ]);
        }

        $team = Team::create([
            'name' => 'Isabelle Muraro Gonçalves',
            'document' => 'OAB/PR 82.313',
            'img_name' => 'isabelle-muraro-goncalves.jpg',
        ]);

        $graduation  =array("Graduada em Direito pela Universidade Estadual do Norte do Paraná (UENP)", "Especialista em Direito Administrativo pela Faculdade Estácio de Sá", "Especialista em Filosofia Jurídica e Política pela Universidade Estadual de Londrina (UEL)", "Especialista em Humanidades pela Universidade Estadual do Norte do Paraná (UENP)", "Mestre em História pela Universidade Estadual de Ponta Grossa (UEPG)");

        foreach ($graduation as $item) {
            Graduation::create([
                'team_id' => $team->id,
                'description' => $item
            ]);
        }


        $team = Team::create([
            'name' => 'Dorival Assi Junior',
            'document' => 'OAB/PR 74.006',
            'img_name' => 'dorival-assi-junior.jpg',
        ]);

        $graduation  =array("Graduado em Direito pelo Centro Universitário de Ourinhos (UNIFIO);", "Especialista em Direito Tributário pelo Instituto Brasileiro de Estudos Tributários (IBET)", "Especialista em Direito Eleitoral pelo Instituto para o desenvolvimento democrático (IDDE)", "Especialista em Direito do Estado pela Universidade Estadual de Londrina (UEL)", "Membro da Comissão de Direito Eleitoral da OAB/PR");

        foreach ($graduation as $item) {
            Graduation::create([
                'team_id' => $team->id,
                'description' => $item
            ]);
        }


        $company = Company::create([
            'short_name' => 'QMA',
            'full_name' => 'Queiroz, Muraro & Assi Advocacia',
            'cnpj' => '',
            'email' => 'contato@advocaciaqma.com',
            'phone' => '(43) 98842-7402',
            'whatsapp' => '(43) 98842-7402',
            'address' =>array("Rua Paraná, 1909, Centro, Siqueira Campos/PR, CEP 84.940-000", "Rua João Sbolli, 121, Centro, Quatiguá/PR, CEP 86.450-000", "Rua Marechal Hermes, 43, Centro Cívico, Curitiba/PR CEP 80.530-230")
        ]);
    }
}
