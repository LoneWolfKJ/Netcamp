package com.example.buzz;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.example.buzz.R;

import java.util.ArrayList;

public class QuizActivity extends AppCompatActivity implements View.OnClickListener {

    Button btn_one, btn_two, btn_three, btn_four;
    TextView tv_question;

    private Question question = new Question();
    private String hint;
    private String answer;
    private int questionLength = question.questions.length;
    ArrayList<Integer> questionnumbers = question.getRandomNonRepeatingIntegers(6,0,8);
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_quiz);


        if (MainActivity.score!=0){
            MainActivity.score=0;
        }

        btn_one = (Button)findViewById(R.id.btn_one);
        btn_one.setOnClickListener(this);
        btn_two = (Button)findViewById(R.id.btn_two);
        btn_two.setOnClickListener(this);
        btn_three = (Button)findViewById(R.id.btn_three);
        btn_three.setOnClickListener(this);
        btn_four = (Button)findViewById(R.id.btn_four);
        btn_four.setOnClickListener(this);

        tv_question = (TextView)findViewById(R.id.tv_question);

        NextQuestion((int)questionnumbers.get(0));
    }
    int k=0;

    @Override
    public void onClick(View v) {
        k++;
        switch (v.getId()){
            case R.id.btn_one:
                if(btn_one.getText() == answer){
                    Toast.makeText(QuizActivity.this, "You Are Correct", Toast.LENGTH_SHORT).show();
                    ++MainActivity.score;
                    NextQuestion((int)questionnumbers.get(k));
                }else{
                    --MainActivity.score;
                    Toast.makeText(this, hint, Toast.LENGTH_LONG).show();
                    NextQuestion((int)questionnumbers.get(k));
                }

                break;

            case R.id.btn_two:
                if(btn_two.getText() == answer){
                    ++MainActivity.score;
                    Toast.makeText(QuizActivity.this, "You Are Correct", Toast.LENGTH_SHORT).show();
                    NextQuestion((int)questionnumbers.get(k));
                }else{
                    --MainActivity.score;
                    Toast.makeText(this, hint, Toast.LENGTH_LONG).show();
                    NextQuestion((int)questionnumbers.get(k));
                }

                break;

            case R.id.btn_three:
                if(btn_three.getText() == answer){
                    ++MainActivity.score;
                    Toast.makeText(QuizActivity.this, "You Are Correct", Toast.LENGTH_SHORT).show();
                    NextQuestion((int)questionnumbers.get(k));
                }else{
                    --MainActivity.score;
                    Toast.makeText(this, hint, Toast.LENGTH_LONG).show();
                    NextQuestion((int)questionnumbers.get(k));
                }

                break;

            case R.id.btn_four:
                if(btn_four.getText() == answer){
                    ++MainActivity.score;
                    Toast.makeText(QuizActivity.this, "You Are Correct", Toast.LENGTH_SHORT).show();
                    NextQuestion((int)questionnumbers.get(k));

                }else{
                    --MainActivity.score;
                    Toast.makeText(this, hint, Toast.LENGTH_LONG).show();
                    NextQuestion((int)questionnumbers.get(k));
                }

                break;
        }
        if(k>=5){
            GameOver();
        }
    }

    private void GameOver(){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(QuizActivity.this);
        alertDialogBuilder
                .setMessage("Game Over. Your Score is " + MainActivity.score+"")
                .setCancelable(false)
                .setPositiveButton("New Game", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        startActivity(new Intent(getApplicationContext(), QuizActivity.class));
                    }
                })
                .setNegativeButton("Exit", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Intent i = new Intent(QuizActivity.this, AllApplications.class);
                        startActivity(i);
                        finish();
                    }
                });
        alertDialogBuilder.show();

    }

    private void NextQuestion(int num){
        tv_question.setText(question.getQuestion(num));
        btn_one.setText(question.getchoice1(num));
        btn_two.setText(question.getchoice2(num));
        btn_three.setText(question.getchoice3(num));
        btn_four.setText(question.getchoice4(num));

        answer = question.getCorrectAnswer(num);
        hint = question.getHint(num);
    }

    @Override
    public void onPointerCaptureChanged(boolean hasCapture) {

    }
}
