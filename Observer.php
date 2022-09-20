<?php
//observable - наблюдаемый объект, хранит в себе массив наблюдателей, может добавить наблюдателя, удалить, и оповестить о событии.
//наблюдаемый обькт один.
//observer - наблюдатель. их может быть много. имеет один метод, который вызывается при оповещении наблюдаемым объектом 


class AplicantPhpProgrammer implements SplObserver
{
    private string $name;
    private string $email;
    private string $workExperience;

    public function __construct(string $name)
    {
        $this->name = $name;

    }

    function update(SplSubject $subject): void
    {
        echo '
        Получил уведомление ' . $this->name . ' о вакансии ' . $subject->getJob();
    }
}

class Jobs implements SplSubject
{
    private array $observers;
    private array $jobs;
    private string $job;


    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void
    {
        $key = array_search($observer,$this->observers, true);
        if($key){
            unset($this->observers[$key]);
        }
    }

    public function addJobs($job)
    {
        $this->jobs[] = $this->job = $job;
        $this->notify();

    }
    public function getJob()
    {
        return $this->job;
    }
    
    public function notify(): void
    {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }
}

$observable = new Jobs(); 

$anna = new AplicantPhpProgrammer('Anna');
$ivan = new AplicantPhpProgrammer('ivan');
$inna = new AplicantPhpProgrammer('inna');

//add 
$observable->attach($anna);
$observable->attach($ivan);

//remove
$observable->detach($inna);

$observable->addJobs('программист PHP');

