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
            "Hot"
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
