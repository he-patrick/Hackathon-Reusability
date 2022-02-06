#set of possible materials in all projects
materials = {'bottle', 'mask'}

#a set of materials the user inputed
userMaterials = {}

#data structure storing the project info needed to sort
class project:

    #constructor
    def __init__(self, difficulty, materialsNeeded, likes) -> None:
        self.difficulty = difficulty #from 1 to 5
        self.materialsNeeded = materialsNeeded # a list of all materials
        self.likes = likes # number of user likes

    #creates string for printing
    def __repr__(self) -> str:
       return repr(self.difficulty)+  ':' + repr(self.materialsNeeded) + ':' + repr(self.likes)

projects = []

def sort(sortType):
    if(sortType == 'difficulty'):
        projects.sort(key = diffSort)

    elif(sortType == 'materialsNeeded'):
        projects.sort(key = matSort)
    elif(sortType == 'likes'):
        projects.sort(key=likeSort)

def diffSort(project):
    return project.difficulty

def likeSort(project):
    return project.likes

def matSort(project):
    return materialMatchScore(project.materialsNeeded)

def materialMatchScore(materialsNeeded):
    score = 0
    for material in materials:
        if material in userMaterials:
            score += 1
    
    return score