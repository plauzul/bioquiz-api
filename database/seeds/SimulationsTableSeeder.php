<?php

use Illuminate\Database\Seeder;

class SimulationsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('simulations')->insert([
            'proof_id' => 1,
            'question' => 'A produção de vacinas exige conhecimento técnico e controle de qualidade. Nessa produção, duas fases principais são importantes: a fase biológica, que identifica e faz as culturas dos micro-organismos causadores da doença, que serão, posteriormente, atenuados ou inativados; e a fase farmacêutica, que consiste na obtenção final do produto. Assim, considerando uma vacina contra a dengue, para que sua eficiência seja constatada, ela deverá',
            'a' => 'aumentar a quantidade de glóbulos vermelhos no sangue dos organismos contaminados, para facilitar o processo de defesa contra os micro-organismos causadores da doença.',
            'b' => 'ser amplamente aplicada em mamíferos roedores, pois esses são os principais agentes transmissores dos micro-organismos causadores da dengue nos seres humanos.',
            'c' => 'modificar o material genético dos seres humanos doentes, a fim de induzir a produção de proteínas de defesa e aumentar a imunidade.',
            'd' => 'stimular, nos seres humanos vacinados, a produção de anticorpos específicos, que auxiliam o processo de defesa.',
            'correct' => 'd'
        ]);

        DB::table('simulations')->insert([
            'proof_id' => 1,
            'question' => 'Ana Júlia está super preocupada porque ouviu dizer que, sendo ela Rh - (negativo) e seu namorado Emílio Rh + (positivo), não poderiam se casar e nem ter filhos, porque, senão, todos eles nasceriam com a doença hemolítica eritroblastose fetal, que os mataria logo após o nascimento. Do ponto de vista biológico, o melhor aconselhamento que poderia ser dado a Ana Júlia seria:',
            'a' => 'Não se preocupe porque a informação está totalmente incorreta. Risco de nascer bebês com a doença hemolítica eritroblastose fetal só existiria se vocês dois fossem Rh - (negativo).',
            'b' => 'Realmente, o que você ouviu dizer está correto e vocês não podem ter filhos, porque todos eles apresentariam a doença hemolítica eritroblastose fetal e morreriam, durante a gestação, ou logo após o parto.',
            'c' => 'Não se preocupe porque a informação está completamente errada. O risco de nascer criança com a doença hemolítica eritroblastose fetal não está relacionado com o fator Rh, mas com o fator ABO, podendo ocorrer quando o pai for do grupo AB e a mãe do grupo O.',
            'd' => 'Realmente, essa situação favorece a ocorrência de eritroblastose fetal em bebês que sejam Rh + (positivo). Porém vocês podem perfeitamente se casarem e terem filhos, desde que seja feito um pré-natal adequado, com acompanhamento médico, que deverá tomar todas as medidas de profilaxia ou tratamento, se for necessário.',
            'correct' => 'd'
        ]);
    }
}
