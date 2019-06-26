package com.example.buzz;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class AllApplications extends AppCompatActivity {
    ImageView calculator, camera, mediaPlayer, surprise;
    static int showalert = 0;
    static int rotation=0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {

        if(showalert!=0){
            showalert=0;
        }

        if(rotation!=0) {
            rotation = 0;
        }

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_all_applications);
        calculator = (ImageView) findViewById(R.id.calculatorButton);
        camera = (ImageView) findViewById(R.id.cameraButton);
        mediaPlayer = (ImageView) findViewById(R.id.mediaPlayerButton);
        surprise = (ImageView) findViewById(R.id.surpriseButton);

        calculator.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplications.this, CalculatorActivity.class);
                startActivity(i);
                finish();
            }
        });
        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplications.this, CameraActivity.class);
                startActivity(i);
                finish();
            }
        });
        mediaPlayer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplications.this, MediaPlayerActivity.class);
                startActivity(i);
                finish();
            }
        });
        surprise.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(AllApplications.this, AllApplicationsSurprise.class);
                startActivity(i);
                finish();
            }
        });
    }
}
