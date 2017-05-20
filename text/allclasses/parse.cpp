#include <iostream>
#include <fstream>
#include <vector>
using namespace std;

//----- PRINT OUT THE VECTOR ------
template <typename T>
void print(vector <T> v){
  for (unsigned int i = 0; i < v.size(); i++){
    cout << v[i] << ",";
  }
  cout << endl;
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

  //-----PARSE STUFF-----
  vector <string> info;
  vector <string> description;
  vector <string> college;
  vector <string> other;
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
      cout << id << endl;













      i++;
    }


}
