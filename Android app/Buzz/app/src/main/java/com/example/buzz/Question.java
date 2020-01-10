package com.example.buzz;

import java.util.ArrayList;
import java.util.Random;

public class Question {

    public static int getRandomInt(int min, int max) {
        Random random = new Random();

        return random.nextInt((max - min) + 1) + min;
    }

    public static ArrayList<Integer> getRandomNonRepeatingIntegers(int size, int min,
                                                                   int max) {
        ArrayList<Integer> numbers = new ArrayList<Integer>();

        while (numbers.size() < size) {
            int random = getRandomInt(min, max);

            if (!numbers.contains(random)) {
                numbers.add(random);
            }
        }

        return numbers;
    }

    public String[] questions = {
            "You are in a cabin and it is pitch black. You have one match on you. Which do you light first, the lamp, the candle, or the fire?",
            "Who is bigger: Mr. Bigger, Mrs. Bigger, or their baby?",
            "A farmer has 17 sheep and all but nine die. How many are left?",
            "How far can a rabbit run into the woods?",
            "Jimmy’s mother had four children. She named the first Monday. She named the Register Tuesday, and she named the third Wednesday. What is the name of the fourth child?",
            "Before Mt. Everest was discovered, what was the highest mountain in the world?",
            "Which is heavier? A pound of feathers or a pound of rocks?",
            "A plane crashes on the border of the U.S. and Canada. Where do they bury the survivors?",
            "Which travels faster? Hot or Cold?"
            "CHICKEN is a delicious meat that can be served in a variety of ways. If someone calls you a CHICKEN, what are they really trying to say?"  
            "POP is another name for soda. An example is Coca-Cola or Coke. If someone calls you POP, what are they implying?"
            "EGGS are used in cakes, omelets and many delicious desserts. If you decide to 'EGG' someone on, what are you doing to them?"  
            "You're 3rd place right now in a race. What place are you in when you pass the person in 2nd place?"
            "Many people like NUTS. Some like cashews, macadamia nuts, or peanuts, and others like pecans. If someone asks you the question, 'Are you NUTS?', what are they really saying?"
            "Some people like to eat bite-sized foods like nachos, chips and other snacks like that. They taste much better if used with a DIP. Tasty dips include cheese dips, guacamole, sour cream and bean dips. If someone says, 'my stock took a DIP today', what really happened?" 
            "Have you ever eaten DUCK? It has a unique taste, not quite like chicken or turkey. DUCK is another one of those words with many meanings. If someone throws a ball at you and your friend yells at you, saying 'DUCK', what are they trying to tell you to do?" 
            "A JAM is a type of preserve or crushed fruit. It is usually mixed with sugar and other flavorings and sold in jars. While out walking, you overhear a bit of a conversion. The person says 'James is in a bit of a JAM'. What has happened to James?"
            "SQUASH is a type of vegetable that resembles a pumpkin. You are walking to your car and you overhear one man yell to another man, 'I will SQUASH you like a bug'. What is he saying he will do?"
            "Most people like FISH. There are a variety of FISH that we eat, ranging from freshwater to deepwater fishes. While chatting with your friend, you mention an activity that you want to do. Your friend says that he is busy and that he can't be bothered because he has a 'bigger FISH to fry'. What does he mean?"




    };

    public String[][] choices = {
            {"lamp", "candle", "something else", "fire"},
            {"Mr. Bigger", "Mrs. Bigger", "The Baby", "Big"},
            {"8", "17", "9", "0"},
            {"Infinitely","All the way to the end","Half way","Cant run since rabbit's hop"},
            {"Thursday","Steve","Jimmy","Mother"},
            {"Mt. Fugi","Mt. Everest","Himalays","Some other whose name you can't remember right now"},
            {"The feathers","The rocks","Neither","a pound of diamonds"},
            {"U.S","India","Canada","Nowhere"},
            {"Hot","Cold","Both have same speed","None"},
            {"You are a coward","Your name is chicken","You are a bird","You can lay eggs"},
            {"You are a type of music","You make a sharp explosive noise","You are a father, or an older man","You are a sweet drink"},
            {"Throwing eggs at them","Cooking them in a dessert","Urge or instigating them to do something","Removing their eggs"},
            {"1st","2nd","3rd","None"},
            {"Is your name nuts?","Are you a type of nut?","Are you crazy?","Are you related to a nut?"},
            {"The stock got wet","The value of the stock declined","The stock was eaten","The stock melted into a waxy substance"}, 
            {"To admire a duck on the water","To move your head or body quickly downward or away","To avoid the issue under discussion","To note that the batsman scored a zero"},    
            {"He is full to capacity","He was put in a bottle","He is in a difficult situation","He is not getting any signals"},
            {"He is going to beat him up or destroy him","They will play a game","He will turn him into a pumpkin","He will buy him a vehicle, then cause an accident"},
            {"He has more important matters to take care of","He is hungry","He caught a big fish and needs to fry it","He needs to catch a fish"},

    };

    public String[] correctAnswer = {
            "something else",
            "The Baby",
            "9",
            "Half way",
            "Jimmy",
            "Mt. Everest",
            "Neither",
            "Nowhere",
            "Hot",
            "You are a coward",
            "You are a father, or an older man",
            "Urge or instigating them to do something",
            "1st",
            "Are you crazy?",
            "The value of the stock declined",
            "To move your head or body quickly downward or away",
            "He is in a difficult situation",
            "He is going to beat him up or destroy him",
            "He has more important matters to take care of",
    };

    public String getHint(int a) {
        return hint[a];
    }

    public String[] hint = {
            "You light the match first!",
            "The baby, because he is a little bigger.",
            "ALL BUT NINE DIED.",
            "Halfway. After that, he is running out of the woods",
            "Jimmy's mother!",
            "Mt. Everest. It was still the highest in the world. It just had not been discovered yet!",
            "Neither. Both weigh a pound!",
            "You do not bury the SURVIVORS!, what are you?? MURDERERS",
            "Hot is faster, because you can catch a cold.",
            "In 'Back to the Future 2' (1989), Biff taunts Marty McFly by asking him if he is CHICKEN. Marty replies, 'Nobody... calls me... chicken.' What happens next has to be seen to be believed. If you haven't seen the movie yet, I won't spoil it for you by saying what happens next.",
            "It is an affectionate term that is used to refer to a daddy, or you may call an older gentleman 'pop' or 'pops'. The term can be respectful or very disrespectful, depending on where you live.",
            "Generally, this is a negative action.",
            "Imagine the situation",
            "In 'The Karate Kid' (1984), when Daniel asks his mom to sign the All-Valley Tournament application form so he can fight, she reads the form before signing it. The form states that if Daniel gets injured, his mom won't hold anyone responsible. She throws away the unsigned form, asking Daniel if he is NUTS, but Daniel rescues the form from the garbage and fakes her signature on it."
            "Stocks are usually volatile, and sometimes for reasons beyond comprehension (mine anyway), the values will rise or DIP, making some people richer and others poorer.",
            "While the other explanations all apply to the word DUCK, none of them are applicable in this situation.",
            "A Three Stooges short film titled 'Gents in a JAM' depicted the stooges in another of their unfortunate mishaps. They were about to get evicted (the JAM), when a bit of luck happened their way. Of course, being the three stooges, they managed to mess up their good luck anyway.",
            "This is one of speedway rider Paul Cooper's favorite sayings. He says that anyone who gets in his way will be SQUASHed like a bug.",
            "Brad Paisley had an entire song dedicated to the words, 'Bigger Fish To Fry'. The short version is that he has done some bad things but the Devil won't notice when he dies and goes to hell, because the Devil will be looking out for the politicians and CEOs. Yep, the Devil's got 'bigger FISH to fry'.",
 };           


    public String getQuestion(int a){
        return questions[a];
    }

    public String getchoice1(int a){
        return choices[a][0];
    }

    public String getchoice2(int a){
        return choices[a][1];
    }

    public String getchoice3(int a){
        return choices[a][2];
    }

    public String getchoice4(int a){
        return choices[a][3];
    }

    public String getCorrectAnswer(int a){
        return correctAnswer[a];
    }
}
