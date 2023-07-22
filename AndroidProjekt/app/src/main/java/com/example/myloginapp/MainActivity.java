package com.example.myloginapp;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.button.MaterialButton;

public class MainActivity extends AppCompatActivity {

    public static final String SHARED_PREFS = "sharedPrefs";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Simplified variable definitions, again TextView can be done like this
        TextView username, password, registerBtn;
        username = (TextView) findViewById(R.id.username);
        password = (TextView) findViewById(R.id.password);
        registerBtn = findViewById(R.id.registerBtn);

        MaterialButton loginbtn = (MaterialButton) findViewById(R.id.loginbtn);
        LoginHandle loginHandle = new LoginHandle();

        loginbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedPreferences sp=getSharedPreferences("Login", MODE_PRIVATE);
                SharedPreferences.Editor Ed=sp.edit();
                Ed.putString("user", username.getText().toString());
                Ed.commit();
                loginHandle.getUser(username.getText().toString(), password.getText().toString(), getApplicationContext());
            }
        });

        registerBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(getApplicationContext(), registerActivity.class);
                startActivity(intentMain);
                finish();
                Toast.makeText(getApplicationContext(), "Bejelentkezés folyamatban...", Toast.LENGTH_SHORT).show();
            }
        });
    }
}