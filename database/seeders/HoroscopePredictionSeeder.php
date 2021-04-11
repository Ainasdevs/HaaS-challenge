<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class HoroscopePredictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\HoroscopePrediction::factory()->count(40)->state(new Sequence(
            ['prediction' => "If you're thinking about investing in real estate, then consider taking the advice of someone who knows you, but that you're not all that close with. There's no reason to be hasty, but if you've already made up your mind, there's no reason to delay.", 'score' => 5],
            ['prediction' => "Keep in mind that someone you've just met to offer suggestions that you shouldn't follow.", 'score' => 2],
            ['prediction' => "Are you thinking about exploring a new possibility? The next week will be remembered as a turning point in your life and everything changed for the better.", 'score' => 10],
            ['prediction' => "If you're considering a big investment, then think not about if, but when to take that step. Don't do anything you'll regret for the rest of your life.", 'score' => 6],
            ['prediction' => "Consider making time to send an email to a friend with three reasons they are important to you. And then you'll earn the clarity you so richly deserve. Beware of unfamiliar places.", 'score' => 7],
            ['prediction' => "If you think your place in the world is uncertain, then the real question is, what is holding you back. Realize that the road to success is paved with the stones of failure.", 'score' => 5],
            ['prediction' => "Today you have the choice to make a new start for yourself. It starts with letting go your earthly desires and keeping a close watch on how that makes you feel. There's no reason to believe you should wait to make these decisions.", 'score' => 9],
            ['prediction' => "Consider a new friend to make a major decision. The power to do the right thing is within you.", 'score' => 8],
            ['prediction' => "If there is nagging doubt in your mind, it might be time to take that plunge. Consider that you can't win every battle, but you can always do your best.", 'score' => 3],
            ['prediction' => "Now is the time that you will come to realize something you forgot about, and it will start to mean something to you. It's just a word of wisdom.", 'score' => 6],
            ['prediction' => "Before you can find answers for yourself, maybe you should listen to a new radio station. By doing this, you will answers to questions long held will become more clear.", 'score' => 6],
            ['prediction' => "Are you thinking about making a change in your personal life? Before next Tuesday or Wednesday you'll find is a turning point in your life and you did the right thing.", 'score' => 9],
            ['prediction' => "Now your Mercury is enunciating, which means that you should look to indiduals who are Libra as they might be someone to find comfort in, for what it's worth.", 'score' => 5],
            ['prediction' => "Are you working towards going back to school? Whether you like it or not, the coming week is the day you stood up for yourself and you'll know what to do.", 'score' => 8],
            ['prediction' => "Consider a co-worker you don't necessarily think about to give you a suggestion you hadn't considered.", 'score' => 5],
            ['prediction' => "If you're considering a big investment, then think not about if, but when to take that step. When in doubt, consult someone wiser than you.", 'score' => 4],
            ['prediction' => "Are you doing something like taking a trip? Now might be the time you decided and you made a decision that would stick with you for the rest of your life.", 'score' => 6],
            ['prediction' => "It's never too late for someone you've just met to lend new perspective to an old concern. Whatever you do, just beware that herpes could be in your long-term future.", 'score' => 1],
            ['prediction' => "You may want a close friend to answer a difficult question. Hold off on major purchases. You already know the right thing to do.", 'score' => 2],
            ['prediction' => "Today you can turn your life around. It starts with looking at the bigger picture and understanding that you have the power to do the right thing.", 'score' => 9],
            ['prediction' => "If you think you might have a big decision coming up, then join the club. But it's never too late to reconsider your options", 'score' => 7],
            ['prediction' => "Today you will earn a truth that was once considered false, and it will become important to you once again. So just consider this as you go into today.", 'score' => 7],
            ['prediction' => "Are you thinking about making a change in your personal life? Ambiguity aside, this you'll find is the right time and the trajectory of your life shifted, even if subtly.", 'score' => 6],
            ['prediction' => "If you're thinking about investing in real estate, then don't put it off. This advice is only a guideline, but it is indeed very serious and important.", 'score' => 4],
            ['prediction' => "What you need to know is soon you will meet something you never knew you deserved, and it will force you to remember things gone by. So man up and make it happen.", 'score' => 5],
            ['prediction' => "Today your Pluto is waning, which means that you should look to those of the sign Pisces who might be helpful to you in your future, which says something.", 'score' => 6],
            ['prediction' => "If you think you might be ready for a major commitment, then weigh your options and do the right thing. Understand that even if you stumble, you can always regain your footing.", 'score' => 4],
            ['prediction' => "Today you will come to terms with something you never knew you deserved, and it will take on a new meaning to you. Take this as your gentle nudge in the right direction.", 'score' => 6],
            ['prediction' => "If you think your place in the world is uncertain, you might want to hold off on a big decision. Think about the fact that you can do anything you want in the end.", 'score' => 2],
            ['prediction' => "This week you will uncover a photograph in black and white. It's of a person who is no longer with us, and it will think about how you treat the people around you. Own this day.", 'score' => 3],
            ['prediction' => "Consider making time to take a ten-minute cold shower. When you do the answers will become more clear. Your grasp of the details is unshakable.", 'score' => 6],
            ['prediction' => "Realize that you can't control everything.", 'score' => 2],
            ['prediction' => "Seek out an older relative to give you advice that really won't help you.", 'score' => 2],
            ['prediction' => "Understand that the road to success is paved with the stones of failure.", 'score' => 2],
            ['prediction' => "If you're going to do one thing this year, then you might be right. If that doesn't make sense for you, then the time is obviously wrong.", 'score' => 2],
            ['prediction' => "Just think, if it seems to good to be true, it probably is.", 'score' => 2],
            ['prediction' => "You should consider someone you trust to steer you in the wrong direction.", 'score' => 2],
            ['prediction' => "If you don't think you know exactly what you might want, then the real question is, what is holding you back. Consider that not every fork in the road has a clearly better path.", 'score' => 3],
            ['prediction' => "Are you thinking about making a job move? Whether you like it or not, the coming week will prove to be the day you choose to decide and it will be time to act.", 'score' => 4],
            ['prediction' => "Consider someone you look up to to give you bad advice. If you're ready to make a move, this week is a good time. Go with your second instinct on this one, not your first.", 'score' => 3],

        ))->create();
    }
}
