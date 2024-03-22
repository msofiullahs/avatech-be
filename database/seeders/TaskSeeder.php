<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Lorem Ipsum',
            'Dolor Sit Amet',
            'Consectetur Adipiscing Elit',
            'Inde Igitur',
            'Inquit, Ordiendum Est',
            'Sed haec nihil sane ad rem',
            'Duo Reges: constructio interrete',
            'Sed tu istuc dixti bene Latine',
            'Parum plane',
        ];
        $descriptions = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Primum quid tu dicis breve? Obsecro, inquit, Torquate, haec dicit Epicurus? Bork Ita prorsus, inquam; Scrupulum, inquam, abeunti; Graccho, eius fere, aequalí?',
            'Duo Reges: constructio interrete. Ut id aliis narrare gestiant? Ut in geometria, prima si dederis, danda sunt omnia. Non autem hoc: igitur ne illud quidem.',
            'Vide, quantum, inquam, fallare, Torquate. Quid Zeno? Nihil sane. Erat enim res aperta. Si longus, levis dictata sunt. Ergo instituto veterum, quo etiam Stoici utuntur, hinc capiamus exordium.',
            'Bork Quarum ambarum rerum cum medicinam pollicetur, luxuriae licentiam pollicetur. Si enim ad populum me vocas, eum.',
            'Quid enim possumus hoc agere divinius? An nisi populari fama? Sed quid sentiat, non videtis. Videamus igitur sententias eorum, tum ad verba redeamus. Explanetur igitur. Bork Quis enim redargueret? Quid est, quod ab ea absolvi et perfici debeat?',
            'Et quidem, inquit, vehementer errat; At, si voluptas esset bonum, desideraret. Non laboro, inquit, de nomine. Res enim concurrent contrariae.',
            'Non est igitur voluptas bonum. Quid enim est a Chrysippo praetermissum in Stoicis?',
            'An eiusdem modi? Quae duo sunt, unum facit. Bork Duo enim genera quae erant, fecit tria. Id Sextilius factum negabat. Quod autem ratione actum est, id officium appellamus. Erat enim Polemonis. Haec para/doca illi, nos admirabilia dicamus.',
            'Hoc est non dividere, sed frangere. Verum esto; Verum hoc idem saepe faciamus.',
            'Velut ego nunc moveor. Minime vero, inquit ille, consentit. Non potes, nisi retexueris illa. Quo tandem modo?',
        ];

        $start = Carbon::now()->format('Y-m-d');
        $end = Carbon::now()->addMonths(3)->format('Y-m-d');
        $period = CarbonPeriod::create($start, '3 days', $end);
        $dates = $period->toArray();

        for ($i = 0; $i < 40; $i++) {
            $reporter = $this->randomizeData([2, 3]);
            $assignee = $this->randomizeData([4, 5]);

            $ranges = range(1, 4);
            $priority = $this->randomizeData($ranges);
            $status = $this->randomizeData($ranges);

            $title = $this->randomizeData($titles);
            $description = $this->randomizeData($descriptions);
            $dueDate = $this->randomizeData($dates);

            $task = new Task();
            $task->title = $title;
            $task->description = $description;
            $task->due_date = $dueDate;
            $task->priority_id = $priority;
            $task->reporter_id = $reporter;
            $task->assignee_id = $assignee;
            $task->status_id = $status;
            $task->save();
        }
    }

    public function randomizeData($data)
    {
        $randomize = array_rand($data);
        return $data[$randomize];
    }
}
