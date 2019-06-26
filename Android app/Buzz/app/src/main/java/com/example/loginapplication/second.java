package com.example.loginapplication;

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

public class second extends AppCompatActivity {
    EditText name, email, password;
    Button register, back;
    @SuppressLint("ClickableViewAccessibility")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);

        final Handler handler = new Handler();


        register =(Button) findViewById(R.id.button4);
        back =(Button)findViewById(R.id.button3);
        name =(EditText)findViewById(R.id.editText3);
        email =(EditText)findViewById(R.id.editText4);
        password =(EditText)findViewById(R.id.editText5);

        back.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN){
                    back.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient_on_click));
                    return true;
                } else if(motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    back.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient));
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            Intent i = new Intent(second.this,MainActivity.class);
                            startActivity(i);
                            finish();
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
        register.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN){
                    register.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient_on_click));
                    return true;
                } else if(motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    register.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient));
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            String s1 = name.getText().toString();
                            String s2 = email.getText().toString();
                            String s3 = password.getText().toString();
                            if (s1.equals("") || s2.equals("") || s3.equals("")) {
                                Toast.makeText(second.this, "fill all", Toast.LENGTH_SHORT).show();
                            } else {
                                SQLiteDatabase liya  = openOrCreateDatabase("bit", MODE_PRIVATE, null);
                                liya.execSQL("create table if not exists mesra (name varchar, email varchar, password varchar)");
                                String s4="select * from mesra where name = '"+s1+"' and email = '"+s2+"' and password = '"+s3+"'";
                                // In android cursor is a class where we can store some value

                                Cursor cursor = liya.rawQuery(s4, null);
                                if (cursor.getCount() > 0) {
                                    Toast.makeText(second.this, "User Already Exists", Toast.LENGTH_SHORT).show();
                                    Intent i = new Intent(second.this, MainActivity.class);
                                    startActivity(i);
                                    finish();
                                } else {
                                    liya.execSQL("insert into mesra values('"+s1+"', '"+s2+"', '"+s3+"')");
                                    Toast.makeText(second.this, "User Registered", Toast.LENGTH_SHORT).show();
                                    Intent k = new Intent(second.this, MainActivity.class);
                                    startActivity(k);
                                    finish();
                                }
                            }
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
    }
}
