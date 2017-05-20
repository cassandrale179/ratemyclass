#include <iostream>
#include <fstream>
#include <vector>
using namespace std;

//----- PRINT OUT THE VECTOR ------
template <typename T>
void print(vector <T> v){
  for (unsigned int i = 0; i < v.size(); i++){
    cout << v[i] << endl;
  }
  cout << "------------------------------------" << endl;
}


//----- READING IN THE FILE --------
int main(){
  ifstream is("CS.txt");
  vector <string> v;
  string line;
  while(!is.eof()){
    getline(is, line);
    v.push_back(line);
  }

  //-----PUT THE WHITESPACE-----
  vector <int> pos;
  for (unsigned int i = 0; i < v.size(); i++){
    if (v[i] == "") pos.push_back(i);
  }

  //------ VECTOR TO BE USED--------
  vector <string> info;
  vector <string> description;
  vector <string> college;
  vector <string> other;
  vector <string> idVec;
  vector <string> titleVec;
  vector <string> creditVec;

  //-----PARSE STUFF-----
  unsigned int j = 0;
  int k = 0;
  while(j < pos.size())
  {
    while(k < pos[j]){
      info.push_back(v[k]); k++;
      description.push_back(v[k]); k++;
      college.push_back(v[k]); k++;
      while (k < pos[j]){
        other.push_back(v[k]);
        k++;
      }
    }
    k++;
    j++;
  }

    //-----WORKING WITH THE INFO VECTOR-----------
    unsigned int i = 0;
    while(i < info.size())
    {
      //---- CREATE A VECTOR THAT HOLD ALL THE WHITE SPACE----
      vector <int> space;
      string str = info[i];
      for (unsigned int a = 0; a < str.size(); a++){
        if (str[a] == 32) space.push_back(a);
      }
      //----- EXTRACT ID, TITLE AND CREDIT-------
      string id = str.substr(0,space[0]) + str.substr(space[0]+1, 3);
      idVec.push_back(id);
      string title = str.substr(space[1]+1, space[space.size()-2]-space[1]);
      titleVec.push_back(title);
      string credit = str.substr(space[space.size()-2]+1, 4);
      creditVec.push_back(credit);
      i++;
    }

  ofstream os("CS2.txt");
  string x = "\",\"";
  for (unsigned int a = 0; a < idVec.size(); a++){
    os << "INSERT INTO course(class, title, description, credit, college) VALUES(\"";
    os << idVec[a] << x << titleVec[a] << x << description[a] << x << creditVec[a] << x << "CI";
    os << "\");" << endl;
    os << endl;
  }
}
