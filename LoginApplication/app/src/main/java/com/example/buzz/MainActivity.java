package com.example.buzz;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.os.Handler;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import static com.example.buzz.AllApplications.showalert;

public class MainActivity extends AppCompatActivity {

    EditText e1,e2;
    Button b1,b2;

    public static int score = 0;

    @SuppressLint("ClickableViewAccessibility")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        e1=(EditText)findViewById(R.id.editText);
        e2=(EditText)findViewById(R.id.editText2);
        b1=(Button)findViewById(R.id.button);
        b2=(Button)findViewById(R.id.button2);

        b1.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN){
                    b1.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient_on_click));
                    return true;
                } else if(motionEvent.getAction() == MotionEvent.ACTION_UP)
                {
                    b1.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            String s1 = e1.getText().toString();
                            String s2 = e2.getText().toString();
                            if(s1.equals("") || s2.equals("")) {
                                Toast.makeText(MainActivity.this, "Fill all", Toast.LENGTH_SHORT).show();
//                    Intent i = new Intent(MainActivity.this, AllApplications.class);
//                    startActivity(i);
//                    finish();
                            } else {
                                SQLiteDatabase userDatabase = openOrCreateDatabase("users", MODE_PRIVATE, null);
                                userDatabase.execSQL("create table if not exists data (name varchar, email varchar, password varchar)");
                                String s3="select * from data where email = '"+s1+"' and password = '"+s2+"'";
                                Cursor cursor = userDatabase.rawQuery(s3, null);
                                if(cursor.getCount() > 0) {
                                    Toast.makeText(MainActivity.this, "GoodJob", Toast.LENGTH_SHORT).show();
                                    Intent i = new Intent(MainActivity.this, AllApplications.class);
                                    startActivity(i);
                                    finish();
                                } else {
                                    Toast.makeText(MainActivity.this, "Sorry, couldn't log you in", Toast.LENGTH_SHORT).show();
                                }
                            }
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
        b2.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN){
                    b2.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient_on_click));
                    return true;
                } else if(motionEvent.getAction() == MotionEvent.ACTION_UP)
                {
                    b2.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            Intent i = new Intent(MainActivity.this, Register.class);
                            startActivity(i);
                            finish();
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
    }
}
