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
            "If A is substituted by 4, B by 3, C by 2, D by 4, E by 3, F by 2 and so on, then what will be total of the numerical values of the letters of the word SICK?"
            "Four of the following five are alike in a certain way and hence form a group. Which one does not belong to the group?"  
          " In a certain code GARNISH is written as RGAINHS. How will GENIOUS be written in that code?"    
          "On a menu what is Bombay Duck?"
          "Who was the first Twitter user to reach 20 million followers?"
          "What animal can run the fastest:"
          "When is the World AIDS Day observed all over the world?"
          "Easter falls on which day?"
          "When was the first television first introduced in India?"   
          "Octomber 14 is observed as"  
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
            {"Hot","Cold","Both have same speed","None"}
            {"11","12","10","9"}
            {"52","70","48","68"}
            {"NEGOISU","NGEOISU","NGESUOI","NEGSUOI"}
            {"Fish","Cake","chocolate","chicken"} 
            {"Lady Gaga","Shah Rukh khan","Katrina Kaif","None"} 
            {"Elephant","Squirrel","Cat","none"}
            {" 1st october","1st December","12th December","12th November"}
            {"Sunday","Monday","Tuesday","Wednesday"}
            {"1947","1959","1969","1971"}
            {" World Information Day","World Animal Welfare Day","World Standards Day","None"}  
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
            "11",
            "70",
            "NGEOISU",
            "Fish",
            "Lady Gaga",
            "Elephant",
            "1st December",
            "Sunday"
            "1959"
            "World Standards Day"  
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
            "Hot is faster, because you can catch a cold."

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
