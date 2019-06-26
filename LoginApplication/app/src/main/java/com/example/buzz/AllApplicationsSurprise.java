package com.example.buzz;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class AllApplicationsSurprise extends AppCompatActivity {
    ImageView quiz, magicalMusicPlayer, back, logout;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_all_applications_surprise);
        logout = (ImageView) findViewById(R.id.logout);
        quiz = (ImageView) findViewById(R.id.quizButton);
        magicalMusicPlayer = (ImageView) findViewById(R.id.magicalMusicPlayerButton);
        back = (ImageView) findViewById(R.id.backToAllApps);
        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplicationsSurprise.this, AllApplications.class);
                startActivity(i);
                finish();
            }
        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplicationsSurprise.this, MainActivity.class);
                startActivity(i);
                finish();
            }
        });

        quiz.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplicationsSurprise.this, QuizActivity.class);
                startActivity(i);
                finish();
            }
        });

        magicalMusicPlayer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplicationsSurprise.this, SensorBasedMusicPlayer.class);
                startActivity(i);
                finish();
            }
        });
    }
}
