# RateMyClass (www.ratemyclass.org)
RateMyClass is an open source project created at Drexel University that allow students to view score distribution and difficulty of a class through data crowdsourced by Drexel students. 

## How To Use
### 1. Register an account.
Account must be registered with a Drexel University's email address. This is for verification purpose so that grade are only inputted from Drexel students, and not from outsiders. Attempt to register with a non-Drexel University email will result in failure.
### 2. Create an anonymous username and password.
If you forgot your credentials, click "Forgot My Password" and an email will be send to your Drexel University's email address containing your username and password.
### 3. Input at least 3 grades
You will be redirected to the dashboard. To use the search function, input at least 3 grades (e.g A, B, B+) for 3 classes of which you have taken (e.g CS171, CS172, CS164).
### 4. Functionalities:
  - <b> Dashboard </b> is where you can see the grade distribution across all colleges within the University (e.g College of Arts and Science, College of Computing and Informatics...etc.). Live update is a feature on dashboard where you can see recently added scores. 
  - <b> Search bar </b> is where you can find a class's name. 
  - <b> Sorting </b>: choose a major's name (e.g Computer Science) and a sorting order (Easiest->Hardest or Hardest->Easiest).
  - <b> Input </b>: enter grade for classes you have taken.  

## How It Works
- <b> The class ranking is built on the following formula: </b> if class average > 3.30, it is easy. If class average > 2.60, it is medium. Below that is hard. This is graded on a 4.0 scale with 4 = A, 3 = B, 2 = C, 1 = D, and 0 = F. For more information, check out Drexel University's official [GPA calculation.](http://drexel.edu/drexelcentral/transcripts/grades/gpa-calculation/)
- <b> People cannot see your score </b>: The only thing that others user can see is a class average and how many people have submit grade from a class. See [Sample Page](https://www.ratemyclass.org/terms/samplepage.html). We cannot see your grade either, only the classes you have entered. 
- <b> You can only submit your grade once, </b> so make sure you enter the correct grade. 
- <b>Disclaimer</b>: since the classifier (easy, medium, and hard) is based on a formula, it is NOT the ultimate one-fit-all answer. Don't blame me if a class turn out to be hard for you even though it says easy on our website, because the demographics of students who are taking that class might be different :)


## Contributing
1. Pull/Fork
2. Issue Pull Request
3. Make Issues

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests to me.

## License and Copyright
This project is licensed under the [GNU LGPLv3](LICENSE) License.
