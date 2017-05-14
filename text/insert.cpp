#include <iostream>
#include <vector>
#include <fstream>
#include <sstream>
using namespace std;

template <typename T>
void print(vector <T> v){
  for (unsigned int i = 0; i < v.size(); i++){
    cout << v[i] << " ";
  }
}

int main(){

  //create textfile
  ifstream is("CS.txt");
  ofstream os("output.txt");

  //create a list of vectors
  vector <string> v;
  vector <int> whitePos;

  //reading in the file
  string line;
  while(!is.eof()){
    getline(is, line);
    v.push_back(line);
  }


  //create a list of variables
  string information;
  string description;
  string college;
  string repeatStatus;
  vector <string> other;

  for (unsigned int i = 0; i < v.size(); i++){
    if (v[i] == "") whitePos.push_back(i);
  }

  //whitePos = [4,9]
  int vv = 0;
  int ww = 0;
  while(vv < v.size())
  {
    while(ww < whitePos[ww]){
      information = "Information: " + v[vv]; vv++;
      description = "Description: " + v[vv]; vv++;
      college = v[vv]; vv++;
      repeatStatus = v[vv]; vv++;
      while(vv < whitePos[ww]){
        other.push_back(v[vv]);
        vv++;
      }
      os << information << endl;
      os << description << endl;
      os << college << endl;
      os << repeatStatus << endl;
      vv++;
    }
    ww++;
  }


}
